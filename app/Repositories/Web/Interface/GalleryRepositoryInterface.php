<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface GalleryRepositoryInterface
{
    /* ============================================================================
    |  Fetch active gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
