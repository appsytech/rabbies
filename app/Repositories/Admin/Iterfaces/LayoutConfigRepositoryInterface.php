<?php

namespace App\Repositories\Admin\Iterfaces;

use App\Models\Admin\LayoutConfig;
use Illuminate\Pagination\LengthAwarePaginator;

interface LayoutConfigRepositoryInterface
{
    /* ============================================================================
    | Create a new layout config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?LayoutConfig;

    /* ============================================================================
    |   Fetch a single layout config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?LayoutConfig;

    /* ============================================================================
    |  Fetch layout config with optional filters and selected columns.
    ==============================================================================*/
    public function getLayoutConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing layout config record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing layout config record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
