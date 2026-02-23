<?php

namespace App\Services\Web;

use App\Models\Admin\Admin;
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
    |   Fetch a single admin record by its primary ID.
    ==============================================================================*/
    public function find(string $encryptedId, ?array $selectedColumns = null): ?Admin
    {
        $id = (int) decrypt($encryptedId);
        return $this->adminRepo->find($id, $selectedColumns);
    }


    /* ============================================================================
    |  Fetch admin with optional filters and selected columns.
    ==============================================================================*/
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->adminRepo->getAdmins($filterData, $selectedcolumns);
    }
}
