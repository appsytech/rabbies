<?php

namespace App\Services\Admin;

use App\Models\Admin\ClassInfo;
use App\Repositories\Admin\Interfaces\ClassInfoRepositoryInterface;
use App\Repositories\Admin\Interfaces\TeacherRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ClassInfoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ClassInfoRepositoryInterface $classInfoRepo,
        protected TeacherRepositoryInterface $teacherRepo
    ) {}

    /* =============================================================
     | Create a new classes info record.
    ================================================================*/
    public function create($request): ?ClassInfo
    {
        $classTeacherName = $this->teacherRepo->find((int) $request->class_teacher, ['name'])->name;

        $data = [
            'grade' => $request->grade,
            'class_teacher' => (int) $request->class_teacher,
            'class_teacher_name' => $classTeacherName,
            'total_student' => 0,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now(),

        ];

        return $this->classInfoRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single classes info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassInfo
    {
        return $this->classInfoRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch classes info with optional filters and selected columns.
    ==============================================================================*/
    public function getClassInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->classInfoRepo->getClassInfos($filterData, $selectedcolumns);
    }

    /* ============================================================================
    |  Fetch all the classes with no fee record added.
    ==============================================================================*/
    public function getClassesWithoutFee(?array $filterData = null, ?array $selectedColumns = null): ?Collection
    {
        return $this->classInfoRepo->getClassesWithoutFee($filterData, $selectedColumns);
    }

    /* ============================================================================
    | Update an existing classes info record .
    ==============================================================================*/
    public function update($request): bool
    {
        $iD = $request->id;

        $classTeacherName = $this->teacherRepo->find((int) $request->class_teacher, ['name'])->name;

        $data = [
            'grade' => $request->grade,
            'class_teacher' => $request->class_teacher,
            'class_teacher_name' => $classTeacherName,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now(),
        ];

        return $this->classInfoRepo->updateColumns($iD, $data);
    }

    /* ============================================================================
    | Permanently delete an classes info record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->classInfoRepo->delete($id);
    }
}
