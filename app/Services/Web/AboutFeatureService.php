<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\AboutFeatureRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AboutFeatureService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AboutFeatureRepositoryInterface $aboutFeatureRepo
    ) {
        //
    }


    /* ============================================================================
    |  Fetch About Feature with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->aboutFeatureRepo->getAboutFeatures($filterData, $selectedcolumns);
    }
}
