<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TeacherSalary;
use App\Repositories\Admin\Interfaces\TeacherSalaryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TeacherSalaryRepository implements TeacherSalaryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new teacher salary record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?TeacherSalary
    {
        return TeacherSalary::create($data);

    }

    /* ============================================================================
    |   Fetch a single teacher salary  record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?TeacherSalary
    {
        return TeacherSalary::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |   Fetch a latest teacher payment record by teacher ID.
    ==============================================================================*/
    public function findLatestByTeacherId(int $teacherId, ?array $selectedColumns = null): ?TeacherSalary
    {
        return TeacherSalary::where('teacher_id', $teacherId)
            ->orderByDesc('created_at')
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch teacher salaries with optional filters and selected columns.
    ==============================================================================*/
    public function getTeacherSalaries(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {

        return TeacherSalary::when(
            isset($filterData['status']),
            function ($query) use ($filterData) {
                $query->where('status', $filterData['status']);
            }
        )
            ->when(
                isset($filterData['teacherId']),
                function ($query) use ($filterData) {
                    return $query->where('teacher_id', $filterData['teacherId']);
                }
            )
            ->when(
                isset($filterData['academicYear']),
                function ($query) use ($filterData) {
                    return $query->where('academic_year', $filterData['academicYear']);
                }
            )
            ->when(
                isset($filterData['month']),
                function ($query) use ($filterData) {
                    return $query->where('month', $filterData['month']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing teacher salary record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return TeacherSalary::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing teacher salary record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return TeacherSalary::where('id', $id)->delete();

    }
}
