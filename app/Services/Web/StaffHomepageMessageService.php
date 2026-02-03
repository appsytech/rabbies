<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\StaffHomepageMessageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin\StaffHomepageMessage;


class StaffHomepageMessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected StaffHomepageMessageRepositoryInterface $staffHomepageMessageRepo
    ) {
        //
    }

     /* ============================================================================
    |   Fetch a staff homepage message record by its primary ID.
    ==============================================================================*/
    public function find(string $id, ?array $selectedColumns = null): ?StaffHomepageMessage
    {
        $id =  (int) decrypt($id);
        return $this->staffHomepageMessageRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch staff homepage message  with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffMessages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->staffHomepageMessageRepo->getStaffMessages($filterData, $selectedcolumns);
    }
}
