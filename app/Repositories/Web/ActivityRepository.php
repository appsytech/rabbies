<?php

namespace App\Repositories\Web;

use App\Models\Admin\Activity;
use App\Repositories\Web\Interface\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository implements ActivityRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |Find an Activity by its ID with optional columns selection.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Activity
    {
        return Activity::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
     |Retrieve activities filtered by type and active status.
     ==============================================================================*/
    public function getActivitiesByType(string $type = 'current', ?array $filterData = null, ?array $selectedColumns = []): ?Collection
    {
        return Activity::where([
            ['status', true],
            ['type', $type],
        ])
            ->when(
                isset($filterData['exceptId']) && is_numeric($filterData['exceptId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['exceptId']);
                }
            )
            ->when(
                isset($filterData['limit']) && is_numeric($filterData['limit']),
                function ($query) use ($filterData) {
                    return $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->orderBy('sort')
            ->get();
    }
}
