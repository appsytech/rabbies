<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\StaffHomepageMessage;
use Illuminate\Database\Eloquent\Collection;

interface StaffHomepageMessageRepositoryInterface
{
    /* ========================================================================================
    | Create a new staff homepage message record in the database and returns the created record.
    ===========================================================================================*/
    public function create(array $data): ?StaffHomepageMessage;

    /* ============================================================================
    |   Fetch a staff homepage message record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StaffHomepageMessage;

    /* ============================================================================
    |  Fetch staff homepage messages with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffMessages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing staff homepage message record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing staff homepage message record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
