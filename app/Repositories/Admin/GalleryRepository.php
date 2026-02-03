<?php

namespace App\Repositories\Admin;

use App\Models\Admin\GalleryImage;
use App\Repositories\Admin\Interfaces\GalleryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GalleryRepository implements GalleryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new gallery image record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?GalleryImage
    {
        return GalleryImage::create($data);
    }

    /* ============================================================================
    |   Fetch a single gallery image record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?GalleryImage
    {
        return GalleryImage::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return GalleryImage::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%'.$filterData['title'].'%');
            }
        )->when(
            isset($filterData['type']),
            function ($query) use ($filterData) {
                $query->where('type', $filterData['type']);
            }
        )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('sort', 'asc')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing gallery image record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return GalleryImage::where('id', $id)->update($data);
    }

    /* ================================================
    |Delete existing gallery image record by its id.
    ==================================================*/
    public function delete(int $id): bool
    {
        return GalleryImage::where('id', $id)->delete();
    }
}
