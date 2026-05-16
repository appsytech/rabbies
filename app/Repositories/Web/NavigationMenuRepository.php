<?php

namespace App\Repositories\Web;

use App\Models\Admin\NavigationMenu;
use App\Repositories\Web\Interface\NavigationMenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
    |  Fetch navigation menu with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return NavigationMenu::when(
            isset($selectedcolumns) && count($selectedcolumns) >= 1,
            function ($query) use ($selectedcolumns) {
                return $query->select($selectedcolumns);
            }
        )
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();
    }
}
