<?php

namespace App\Services\Admin;

use App\Models\Admin\Teacher;
use App\Repositories\Admin\Interfaces\ReportRepositoryInterface;
use App\Repositories\Admin\Interfaces\TeacherRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected TeacherRepositoryInterface $teacherRepo,
        protected ReportRepositoryInterface $reportRepo
    ) {
        //
    }

    /* =============================================================
     | Create a new teacher record with optional image upload handling.
    ================================================================*/
    public function create($request): bool
    {
        $data = [
            'name' => $request->name,
            'majorSubject' => $request->major_subject ?? null,
            'position' => $request->position ?? null,
            'assignedClass' => $request->assigned_class ?? null,
            'headOfClass' => $request->head_of_class ?? null,
            'teachType' => $request->teach_type ?? null,
            'status' => $request->status ?? null,
            'joinAt' => $request->join_at ?? null,
            'sort' => $request->sort,
            'fbProfile' => $request->fb_profile,
            'instaProfile' => $request->insta_profile,
            'createdBy' => Auth::user()->name,
        ];

        if ($request->hasFile('profile_image')) {
            $data['profileImage'] = $request->file('profile_image')->store('assets/images/teachers', 'public');
        }

        $isCreated = $this->teacherRepo->create($data);

        if ($isCreated) {
            $this->reportRepo->incrementTotalForType('TEACHER');

            return true;
        } else {
            return false;
        }
    }

    /* ============================================================================
    |   Fetch a single Teacher record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Teacher
    {
        return $this->teacherRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->teacherRepo->getTeachers($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing Teacher record .
    ==============================================================================*/
    public function update($request): bool
    {
        $teacherId = $request->id;
        $teacher = $this->teacherRepo->find($teacherId, ['profile_image']);

        $data = [
            'name' => $request->name,
            'major_subject' => $request->major_subject ?? null,
            'position' => $request->position ?? null,
            'assigned_class' => $request->assigned_class ?? null,
            'head_of_class' => $request->head_of_class ?? null,
            'teach_type' => $request->teach_type ?? null,
            'status' => $request->status ?? null,
            'join_at' => $request->join_at ?? null,
            'sort' => $request->sort,
            'fb_profile' => $request->fb_profile,
            'insta_profile' => $request->insta_profile,
            'created_by' => 'Admin',
        ];

        if ($request->hasFile('profile_image')) {

            if (Storage::disk('public')->exists($teacher->profile_image)) {
                Storage::disk('public')->delete($teacher->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')->store('assets/images/teachers', 'public');
        }

        return $this->teacherRepo->updateColumns($teacherId, $data);

    }

    /* ============================================================================
    | Permanently delete an teacher record along with its stored image.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $teacher = $this->teacherRepo->find($id, ['profile_image']);

        if (! $teacher) {
            return false;
        }

        if (! empty($teacher->profile_image) && Storage::disk('public')->exists($teacher->profile_image)) {
            Storage::disk('public')->delete($teacher->profile_image);
        }

        $isDeleted = $this->teacherRepo->delete($id);

        if ($isDeleted) {
            $this->reportRepo->decrementTotalForType('TEACHER');
        }

        return $isDeleted;
    }
}
