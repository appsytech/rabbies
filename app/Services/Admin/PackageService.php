<?php

namespace App\Services\Admin;

use App\Models\Admin\Package;
use App\Repositories\Admin\Interfaces\PackageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class PackageService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected PackageRepositoryInterface $packageRepo
    ) {
        //
    }

    /* =============================================================
    | Create a new Package record.
    ================================================================*/
    public function create($request): ?Package
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author ?? null,
            'status' => $request->status ?? null,
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/images/packages', 'public');

        }

        return $this->packageRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single Package record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Package
    {
        return $this->packageRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch Packages with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->packageRepo->getPackages($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing article record .
    ==============================================================================*/
    public function update($request): bool
    {
        $packageId = $request->id;
        $package = $this->packageRepo->find($packageId, ['image']);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author ?? null,
            'status' => $request->status ?? null,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('image')) {
            if (isset($package->image) && Storage::disk('public')->exists($package->image)) {
                Storage::disk('public')->delete($package->image);
            }
            $data['image'] = $request->file('image')->store('assets/images/packages', 'public');
        }

        return $this->packageRepo->updateColumns($packageId, $data);
    }

    /* ============================================================================
    | Permanently delete an artcle.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $package = $this->packageRepo->find($id, ['image']);

        if (! empty($package->image) && Storage::disk('public')->exists($package->image)) {
            Storage::disk('public')->delete($package->image);
        }

        return $this->packageRepo->delete($id);
    }
}
