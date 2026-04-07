<?php

namespace App\Repositories\Web;

use App\Models\Admin\SocialMediaConfig;
use App\Repositories\Web\Interface\SocialMediaConfigRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SocialMediaConfigRepository implements SocialMediaConfigRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    /* ============================================================================
    |  Fetch social media config with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SocialMediaConfig::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%' . $filterData['name'] . '%');
            }
        )

            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', true)
            ->orderBy('sort', 'asc')
            ->get();
    }
}
