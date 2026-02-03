<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\SchoolStaff;
use Illuminate\Database\Eloquent\Collection;

interface SchoolStaffRepositoryInterface
{
    /* ============================================================================
    | Create a new staff record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolStaff;

    /* ============================================================================
    |   Fetch a single staff record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolStaff;

    /* ============================================================================
    |  Fetch staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing staff record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing staff record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
