<?php

namespace App\Repositories\Web;

use App\Models\Admin\Package;
use App\Repositories\Web\Interface\PackageRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PackageRepository implements PackageRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |  Fetch packages with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return Package::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%' . $filterData['title'] . '%');
            }
        )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->when(
                isset($filterData['exceptId']) && is_numeric($filterData['exceptId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['exceptId']);
                }
            )
            ->where('status', true)
            ->orderBy('sort', 'asc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }


    /* ============================================================================
    |   Fetch a single package record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Package
    {
        return Package::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }
}
