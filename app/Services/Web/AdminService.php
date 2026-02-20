<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AdminRepositoryInterface $adminRepo
    ) {
        //
    }

    /* ============================================================================
    |  Fetch admin with optional filters and selected columns.
    ==============================================================================*/
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->adminRepo->getAdmins($filterData, $selectedcolumns);
    }
}
