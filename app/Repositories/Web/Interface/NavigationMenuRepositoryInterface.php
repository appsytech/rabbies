<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface NavigationMenuRepositoryInterface
{
    /* ============================================================================
    |  Fetch navigation menu with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
