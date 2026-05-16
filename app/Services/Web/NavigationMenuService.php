<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\NavigationMenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NavigationMenuService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected NavigationMenuRepositoryInterface $navigationMenuRepo
    ) {}


    /* ============================================================================
    |  Fetch navigation menu with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->navigationMenuRepo->getNavigationMenus($filterData, $selectedcolumns);
    }
}
