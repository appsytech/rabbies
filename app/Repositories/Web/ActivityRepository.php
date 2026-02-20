<?php

namespace App\Repositories\Web;

use App\Models\Admin\Activity;
use App\Repositories\Web\Interface\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
     |Retrieve activities with active status.
     ==============================================================================*/
    public function getActivities(?array $filterData = null, ?array $selectedColumns = []): ?LengthAwarePaginator
    {
        return Activity::where([
            ['status', true],
        ])
            ->when(
                isset($filterData['exceptId']) && is_numeric($filterData['exceptId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['exceptId']);
                }
            )
            ->when(
                isset($filterData['type']),
                function ($query) use ($filterData) {
                    return $query->where('type', $filterData['type']);
                }
            )
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->orderBy('sort', 'asc')
            ->paginate($filterData['paginateLimit'] ?? 6);
    }
}
