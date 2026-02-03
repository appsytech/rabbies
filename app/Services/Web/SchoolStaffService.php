<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\SchoolStaffRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolStaffService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SchoolStaffRepositoryInterface $schoolStaffRepo
    ) {
        //
    }

    /* ============================================================================
    |  Fetch active staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->schoolStaffRepo->getStaffs($filterData, $selectedcolumns);
    }
}
