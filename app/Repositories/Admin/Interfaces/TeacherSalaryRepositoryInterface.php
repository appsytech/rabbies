<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\TeacherSalary;
use Illuminate\Database\Eloquent\Collection;

interface TeacherSalaryRepositoryInterface
{
    /* ============================================================================
    | Create a new teacher salary record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?TeacherSalary;

    /* ============================================================================
    |   Fetch a single teacher salary  record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?TeacherSalary;

    /* ============================================================================
    |   Fetch a latest teacher payment record by teacher ID.
    ==============================================================================*/
    public function findLatestByTeacherId(int $teacherId, ?array $selectedColumns = null): ?TeacherSalary;

    /* ============================================================================
    |  Fetch teacher salaries with optional filters and selected columns.
    ==============================================================================*/
    public function getTeacherSalaries(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing teacher salary record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing teacher salary record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
