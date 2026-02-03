<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\ClassInfo;
use Illuminate\Database\Eloquent\Collection;

interface ClassInfoRepositoryInterface
{
    /* ============================================================================
    | Create a new classes info record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ClassInfo;

    /* ============================================================================
    |   Fetch a single classes info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassInfo;

    /* ============================================================================
    |  Fetch classes info with optional filters and selected columns.
    ==============================================================================*/
    public function getClassInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |  Fetch all the classes with no fee record added.
    ==============================================================================*/
    public function getClassesWithoutFee(?array $filterData = null, ?array $selectedColumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing classes info record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing classes info record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
