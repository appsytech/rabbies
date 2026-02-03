<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Package;
use Illuminate\Database\Eloquent\Collection;

interface PackageRepositoryInterface
{
    /* ============================================================================
    | Create a new Package record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Package;

    /* ============================================================================
    |   Fetch a single Package record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Package;

    /* ============================================================================
    |  Fetch Packages with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing Package record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing Package record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
