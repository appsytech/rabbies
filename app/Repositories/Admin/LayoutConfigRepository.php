<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LayoutConfig;
use App\Repositories\Admin\Iterfaces\LayoutConfigRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class LayoutConfigRepository implements LayoutConfigRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    | Create a new layout config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?LayoutConfig
    {
        return LayoutConfig::create($data);
    }

    /* ============================================================================
    |   Fetch a single layout config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?LayoutConfig
    {
        return LayoutConfig::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch layout config with optional filters and selected columns.
    ==============================================================================*/
    public function getLayoutConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return LayoutConfig::when(
            isset($filterData['key']),
            function ($query) use ($filterData) {
                $query->where('key', 'LIKE', '%' . $filterData['key'] . '%');
            }
        )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing layout config record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return LayoutConfig::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing layout config record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return LayoutConfig::where('id', $id)->delete();
    }
}
