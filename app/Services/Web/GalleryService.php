<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\GalleryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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

    /* ============================================================================
    |  Fetch active gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->galleryRepo->getGalleryImages($filterData, $selectedcolumns);
    }
}
