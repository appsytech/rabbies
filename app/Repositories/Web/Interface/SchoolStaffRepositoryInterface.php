<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface SchoolStaffRepositoryInterface
{
    /* ============================================================================
    |  Fetch active staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
