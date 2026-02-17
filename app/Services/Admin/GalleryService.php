<?php

namespace App\Services\Admin;

use App\Models\Admin\GalleryImage;
use App\Repositories\Admin\Interfaces\GalleryRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected GalleryRepositoryInterface $galleryRepo
    ) {
        //
    }

    /* =============================================================
     | Create a new gallery image record.
    ================================================================*/
    public function create($request): ?GalleryImage
    {
        $data = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'image_path' => $request->image_path,
            'created_by' => 'admin', // update it after building the login system,
            'is_active' => $request->status,
            'sort' => $request->sort,
            'created_at' => Carbon::now(),

        ];

        if ($request->hasFile('media')) {

            $file = $request->file('media');

            $data['image_path'] = $file->store('assets/images/galleries', 'public');

            $data['file_size'] = $file->getSize(); // bytes

            $mimeType = $file->getMimeType();

            $data['type'] = str_starts_with($mimeType, 'video/') ? 'video' : 'images';
        }

        return $this->galleryRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single gallery image record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?GalleryImage
    {
        return $this->galleryRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->galleryRepo->getGalleryImages($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing gallery image record .
    ==============================================================================*/
    public function update($request): bool
    {
        $galleryImageId = $request->id;
        $galleryImage = $this->galleryRepo->find($galleryImageId, ['image_path']);

        $data = [
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'is_active' => $request->status,
            'sort' => $request->sort,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('media')) {

            if (isset($galleryImage->image_path) && Storage::disk('public')->exists($galleryImage->image_path)) {
                Storage::disk('public')->delete($galleryImage->image_path);
            }

            $file = $request->file('media');
            $data['image_path'] = $file->store('assets/images/galleries', 'public');
            $data['file_size'] = $file->getSize();
            $mimeType = $file->getMimeType();
            $data['type'] = str_starts_with($mimeType, 'video/') ? 'video' : 'images';
        }

        return $this->galleryRepo->updateColumns($galleryImageId, $data);
    }

    /* ============================================================================
    | Toggle gallery image status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $galleryImage = $this->galleryRepo->find($id, ['id', 'is_active']);

        if (! $galleryImage) {
            return false;
        }

        return $this->galleryRepo->updateColumns($id, [
            'is_active' => ! $galleryImage->is_active,
        ]);
    }

    /* ============================================================================
    | Permanently delete an gallery image record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $galleryImage = $this->galleryRepo->find($id, ['id', 'image_path']);

        if (isset($galleryImage->image_path) && Storage::disk('public')->exists($galleryImage->image_path)) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        return $this->galleryRepo->delete($id);
    }
}
