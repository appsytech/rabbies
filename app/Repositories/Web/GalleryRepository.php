<?php

namespace App\Repositories\Web;

use App\Models\Admin\GalleryImage;
use App\Repositories\Web\Interface\GalleryRepositoryInterface;
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
    |  Fetch active gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return GalleryImage::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%' . $filterData['title'] . '%');
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
            ->where('is_active', true)
            ->orderBy('sort', 'asc')
            ->get();
    }
}
