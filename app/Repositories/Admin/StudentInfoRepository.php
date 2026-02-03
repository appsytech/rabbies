<?php

namespace App\Repositories\Admin;

use App\Models\Admin\StudentInfo;
use App\Repositories\Admin\Interfaces\StudentInfoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new student info record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?StudentInfo
    {
        return StudentInfo::create($data);
    }

    /* ============================================================================
    |   Fetch a single student info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StudentInfo
    {
        return StudentInfo::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch student info with optional filters and selected columns.
    ==============================================================================*/
    public function getStudentInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return StudentInfo::when(
            isset($filterData['fullName']),
            function ($query) use ($filterData) {
                $query->where('full_name', 'LIKE', '%'.$filterData['fullName'].'%');
            }
        )
            ->when(
                isset($filterData['gender']),
                function ($query) use ($filterData) {
                    $query->where('gender', $filterData['gender']);
                }
            )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
                }
            )
            ->when(
                isset($filterData['excludeStatus']),
                function ($query) use ($filterData) {
                    $query->where('status', '!=', $filterData['excludeStatus']);
                }
            )
            ->when(
                isset($filterData['gradeId']),
                function ($query) use ($filterData) {
                    $query->where('grade_id', $filterData['gradeId']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing student info record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return StudentInfo::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing student info record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return StudentInfo::where('id', $id)->delete();

    }
}
