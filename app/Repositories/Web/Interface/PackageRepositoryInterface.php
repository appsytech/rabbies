<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Package;
use Illuminate\Pagination\LengthAwarePaginator;

interface PackageRepositoryInterface
{
    /* ============================================================================
    |  Fetch packages with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;


    /* ============================================================================
    |   Fetch a single package record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Package;
}
