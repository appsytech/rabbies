<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Notice;
use Illuminate\Database\Eloquent\Collection;

interface NoticeRepositoryInterface
{
    /* ============================================================================
    | Create a new notice record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Notice;

    /* ============================================================================
    |   Fetch a single notice record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Notice;

    /* ============================================================================
    |  Fetch notice with optional filters and selected columns.
    ==============================================================================*/
    public function getNotices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing notice record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing notice record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
