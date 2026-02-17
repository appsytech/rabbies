<?php

namespace App\Repositories\Web;

use App\Models\Admin\AboutFeature;
use App\Repositories\Web\Interface\AboutFeatureRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AboutFeatureRepository implements AboutFeatureRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    |  Fetch About Feature with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return AboutFeature::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%' . $filterData['title'] . '%');
            }
        )
            ->when(
                isset($filterData['limit']),
                function ($query) use ($filterData) {
                    $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', 'ACTIVE')
            ->orderBy('sort', 'asc')
            ->get();
    }
}
