<?php

namespace App\Services\Web;

use App\Models\Admin\Package;
use App\Repositories\Web\Interface\PackageRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PackageService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected PackageRepositoryInterface $packageRepo
    ) {}



    /* ============================================================================
    |  Fetch packages with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return  $this->packageRepo->getPackages($filterData, $selectedcolumns);
    }


    /* ============================================================================
    |   Fetch a single package record by its primary ID.
    ==============================================================================*/
    public function find(string $id, ?array $selectedColumns = null): ?Package
    {
        $id = (int) decrypt($id);
        return $this->packageRepo->find($id, $selectedColumns);
    }
}
