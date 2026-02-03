<?php

namespace App\Repositories\Web;

use App\Models\Admin\SchoolStaff;
use App\Repositories\Web\Interface\SchoolStaffRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolStaffRepository implements SchoolStaffRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |  Fetch active staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolStaff::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('full_name', 'LIKE', '%'.$filterData['name'].'%');
            }
        )
            ->when(
                isset($filterData['position']),
                function ($query) use ($filterData) {
                    $query->where('position', 'LIKE', '%'.$filterData['position'].'%');
                }
            )
            ->when(
                isset($filterData['type']),
                function ($query) use ($filterData) {
                    $query->where('type', $filterData['type']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', true)
            ->get();
    }
}
