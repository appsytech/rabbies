<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Teacher;
use Illuminate\Database\Eloquent\Collection;

interface TeacherRepositoryInterface
{
    /* ============================================================================
     | Create a new teacher record in the database and returns the created record.
     ==============================================================================*/
    public function create(array $data): ?Teacher;

    /* ============================================================================
    |   Fetch a single teacher record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Teacher;

    /* ============================================================================
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing teacher record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing teacher record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
