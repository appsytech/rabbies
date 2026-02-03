<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\ClassFee;
use Illuminate\Database\Eloquent\Collection;

interface ClassFeeRepositoryInterface
{
    /* ============================================================================
    | Create a new classes fee record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ClassFee;

    /* ============================================================================
    |   Fetch a single classes fee record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassFee;

    /* ============================================================================
    |  Fetch classes fee with optional filters and selected columns.
    ==============================================================================*/
    public function getClassesFee(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing classes fee record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing classes fee record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
