<?php

namespace App\Services\Web;

use App\Models\Admin\AboutUs;
use App\Repositories\Web\Interface\AboutUsRepositoryInterface;

class AboutUsService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AboutUsRepositoryInterface $aboutUsRepo
    ) {
        //
    }

    /* ============================================================================
    |  Fetch first about us.
    ==============================================================================*/
    public function findFirstAboutUs(?array $selectedColumns = null): ?AboutUs
    {
        return $this->aboutUsRepo->findFirstAboutUs($selectedColumns);
    }
}
