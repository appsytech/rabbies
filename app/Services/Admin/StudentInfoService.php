<?php

namespace App\Services\Admin;

use App\Models\Admin\StudentInfo;
use App\Repositories\Admin\Interfaces\ClassInfoRepositoryInterface;
use App\Repositories\Admin\Interfaces\ReportRepositoryInterface;
use App\Repositories\Admin\Interfaces\StudentInfoRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class StudentInfoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected StudentInfoRepositoryInterface $studentInfoRepo,
        protected ClassInfoRepositoryInterface $classInfoRepo,
        protected ReportRepositoryInterface $reportRepo

    ) {
        //
    }

    /* =============================================================
    | Create a new student info record.
    ================================================================*/
    public function create($request): ?StudentInfo
    {
        $gradeId = (int) $request->grade_id;
        $grade = $this->classInfoRepo->find($gradeId, ['id', 'grade']);

        $data = [
            'roll_number' => $request->roll_number,
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'grade_id' => $gradeId,
            'grade_name' => $grade?->grade,
            'section' => $request->Section ?? null,
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,
            'address' => $request->address ?? null,
            'guardian_email' => $request->guardian_email ?? null,
            'admission_date' => $request->admission_date,
            'status' => $request->status,
            'fee_concession_percent' => $request->fee_concession_percent,
            'concession_reason' => $request->concession_reason,
            'created_at' => Carbon::now(),

        ];

        $isCreated = $this->studentInfoRepo->create($data);

        if ($isCreated) {
            $grade->increment('total_student');
            $this->reportRepo->incrementTotalForType('STUDENT');
        }

        return $isCreated;
    }

    /* ============================================================================
    |   Fetch a single student info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StudentInfo
    {
        return $this->studentInfoRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch student info with optional filters and selected columns.
    ==============================================================================*/
    public function getStudentInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->studentInfoRepo->getStudentInfos($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing student info record .
    ==============================================================================*/
    public function update($request): bool
    {
        $studentInfoId = $request->id;

        $studentInfoExistingGradeId = (int) $this->studentInfoRepo->find($studentInfoId, ['grade_id'])?->grade_id ?? 0;
        $studentInfoExistingGrade = $this->classInfoRepo->find($studentInfoExistingGradeId, ['id', 'total_student']);

        $gradeId = (int) $request->grade_id;
        $grade = $this->classInfoRepo->find($gradeId, ['id', 'grade']);

        $data = [
            'roll_number' => $request->roll_number,
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'grade_id' => $gradeId,
            'grade_name' => $grade->grade,
            'section' => $request->Section ?? null,
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,
            'address' => $request->address ?? null,
            'guardian_email' => $request->guardian_email ?? null,
            'admission_date' => $request->admission_date,
            'status' => $request->status,
            'fee_concession_percent' => $request->fee_concession_percent,
            'concession_reason' => $request->concession_reason,
            'updated_at' => Carbon::now(),
        ];

        $isUpdated = $this->studentInfoRepo->updateColumns($studentInfoId, $data);

        if ($isUpdated) {
            $studentInfoExistingGrade->decrement('total_student');
            $grade->increment('total_student');
        }

        return $isUpdated;
    }

    /* ============================================================================
    | Permanently delete an student info.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $studentInfoExistingGradeId = (int) $this->studentInfoRepo->find($id, ['grade_id'])?->grade_id ?? 0;
        $studentInfoExistingGrade = $this->classInfoRepo->find($studentInfoExistingGradeId, ['id', 'total_student']);

        $isDeleted = $this->studentInfoRepo->delete($id);

        if ($isDeleted) {
            $studentInfoExistingGrade->decrement('total_student');
            $this->reportRepo->decrementTotalForType('STUDENT');
        }

        return $isDeleted;
    }
}
