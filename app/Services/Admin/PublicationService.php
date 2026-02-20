<?php

namespace App\Services\Admin;

use App\Models\Admin\Publication;
use App\Repositories\Admin\Interfaces\PublicationRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class PublicationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected PublicationRepositoryInterface $publicationRepo
    ) {
        //
    }

    /* =============================================================
    | Create a new publication record.
    ================================================================*/
    public function create($request): ?Publication
    {
        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('assets/document/publication', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('assets/thumbnail/publication', 'public');
        }

        return $this->publicationRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Publication
    {
        return $this->publicationRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->publicationRepo->getPublications($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing publication record .
    ==============================================================================*/
    public function update($request): bool
    {
        $publicationId = $request->id;
        $publication = $this->publicationRepo->find($publicationId, ['document']);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('document')) {
            if (isset($publication->document) && Storage::disk('public')->exists($publication->document)) {
                Storage::disk('public')->delete($publication->document);
            }
            $data['document'] = $request->file('document')->store('assets/document/publication', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            if (isset($publication->thumbnail) && Storage::disk('public')->exists($publication->thumbnail)) {
                Storage::disk('public')->delete($publication->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('assets/thumbnail/publication', 'public');
        }

        return $this->publicationRepo->updateColumns($publicationId, $data);
    }

    /* ============================================================================
    | Toggle publication status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $publication = $this->publicationRepo->find($id, ['id', 'status']);

        if (! $publication) {
            return false;
        }

        return $this->publicationRepo->updateColumns($id, [
            'status' => ! $publication->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an publication.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $publication = $this->publicationRepo->find($id, ['document']);

        if (! empty($publication->document) && Storage::disk('public')->exists($publication->document)) {
            Storage::disk('public')->delete($publication->document);
        }

        if (! empty($publication->thumbnail) && Storage::disk('public')->exists($publication->thumbnail)) {
            Storage::disk('public')->delete($publication->thumbnail);
        }

        return $this->publicationRepo->delete($id);
    }
}
