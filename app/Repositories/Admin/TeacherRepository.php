<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Teacher;
use App\Repositories\Admin\Interfaces\TeacherRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TeacherRepository implements TeacherRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new teacher record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Teacher
    {
        return Teacher::create([
            'name' => $data['name'],
            'profile_image' => $data['profileImage'] ?? null,
            'major_subject' => $data['majorSubject'] ?? null,
            'position' => $data['position'] ?? null,
            'assigned_class' => $data['assignedClass'] ?? null,
            'head_of_class' => $data['headOfClass'] ?? null,
            'teach_type' => $data['teachType'] ?? null,
            'status' => $data['status'] ?? null,
            'join_at' => $data['joinAt'] ?? null,
            'created_by' => $data['createdBy'] ?? null,
            'sort' => $data['sort'] ?? 0,
            'fb_profile' => $data['fbProfile'] ?? null,
            'insta_profile' => $data['instaProfile'] ?? null,
            'created_at' => Carbon::now(),
        ]);
    }

    /* ============================================================================
    |   Fetch a single Teacher record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Teacher
    {
        return Teacher::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Teacher::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%'.$filterData['name'].'%');
            }
        )
            ->when(
                isset($filterData['position']),
                function ($query) use ($filterData) {
                    $query->where('position', 'LIKE', '%'.$filterData['position'].'%');
                }
            )
            ->when(
                isset($filterData['teachType']),
                function ($query) use ($filterData) {
                    $query->where('teach_type', $filterData['teachType']);
                }
            )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('sort', 'asc')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing teacher record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Teacher::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing teacher record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return Teacher::where('id', $id)->delete();
    }
}
