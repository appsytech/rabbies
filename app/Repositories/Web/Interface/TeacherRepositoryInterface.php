<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface TeacherRepositoryInterface
{
    /* ============================================================================
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
