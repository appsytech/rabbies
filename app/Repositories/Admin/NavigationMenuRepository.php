<?php

namespace App\Repositories\Admin;

use App\Models\Admin\NavigationMenu;
use App\Repositories\Admin\Interfaces\NavigationMenuRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class NavigationMenuRepository implements NavigationMenuRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    | Create a new navigation menu record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?NavigationMenu
    {
        return NavigationMenu::create($data);
    }

    /* ============================================================================
    |   Fetch a single navigation menu record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?NavigationMenu
    {
        return NavigationMenu::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }


    /* ============================================================================
    |  Fetch navigation menu with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return NavigationMenu::when(
            isset($filterData['type']),
            function ($query) use ($filterData) {
                $query->where('type', 'LIKE', '%' . $filterData['type'] . '%');
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
            ->orderBy('sort', 'asc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing navigation menu record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return NavigationMenu::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing navigation menu record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return NavigationMenu::where('id', $id)->delete();
    }
}
