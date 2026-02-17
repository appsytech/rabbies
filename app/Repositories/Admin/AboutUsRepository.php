<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AboutUs;
use App\Repositories\Admin\Interfaces\AboutUsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AboutUsRepository implements AboutUsRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    |   Fetch a single about us record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutUs
    {
        return AboutUs::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch about us with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutUs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return AboutUs::when(
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
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing about us record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return AboutUs::where('id', $id)->update($data);
    }
}
