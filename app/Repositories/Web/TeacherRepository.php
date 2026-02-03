<?php

namespace App\Repositories\Web;

use App\Models\Admin\Teacher;
use App\Repositories\Web\Interface\TeacherRepositoryInterface;
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
    |  Fetch teachers with optional filters and selected columns.
    ==============================================================================*/
    public function getTeachers(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Teacher::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%'.$filterData['name'].'%');
            }
        )->when(
            isset($filterData['position']),
            function ($query) use ($filterData) {
                $query->where('position', 'LIKE', '%'.$filterData['position'].'%');
            }
        )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('sort')
            ->where('status', true)
            ->get();
    }
}
