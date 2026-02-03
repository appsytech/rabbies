<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\StudentInfo;
use Illuminate\Database\Eloquent\Collection;

interface StudentInfoRepositoryInterface
{
    /* ============================================================================
    | Create a new student info record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?StudentInfo;

    /* ============================================================================
    |   Fetch a single student info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StudentInfo;

    /* ============================================================================
    |  Fetch student info with optional filters and selected columns.
    ==============================================================================*/
    public function getStudentInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing student info record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing student info record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
