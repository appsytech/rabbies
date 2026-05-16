<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\NavigationMenu;
use Illuminate\Pagination\LengthAwarePaginator;

interface NavigationMenuRepositoryInterface
{
    /* ============================================================================
    | Create a new navigation menu record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?NavigationMenu;

    /* ============================================================================
    |   Fetch a single navigation menu record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?NavigationMenu;

    /* ============================================================================
    |  Fetch navigation menu with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing navigation menu record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing navigation menu record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
