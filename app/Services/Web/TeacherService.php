<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\TeacherRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected TeacherRepositoryInterface $teacherRepo
    ) {
        //
    }

    /* ============================================================================
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->teacherRepo->getTeachers($filterData, $selectedcolumns);
    }
}
