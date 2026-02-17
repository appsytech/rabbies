<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\AboutUs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AboutUsRepositoryInterface
{

    /* ============================================================================
    |   Fetch a single about us record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutUs;

    /* ============================================================================
    |  Fetch about us with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutUs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing about us record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;
}
