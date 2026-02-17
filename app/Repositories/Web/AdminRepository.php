<?php

namespace App\Repositories\Web;

use App\Models\Admin\Admin;
use App\Repositories\Web\Interface\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |   Fetch a single admin record by its credentials like email, phone etc.
    ==============================================================================*/
    public function findByCredential(string $credential, ?array $selectedColumns = null): ?Admin
    {
        return Admin::where('email', $credential)
            ->orWhere('username', $credential)
            ->orWhere('phone', $credential)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }



    /* ============================================================================
    |  Fetch admin with optional filters and selected columns.
    ==============================================================================*/
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Admin::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%' . $filterData['name'] . '%');
            }
        )
            ->when(
                isset($filterData['userName']),
                function ($query) use ($filterData) {
                    $query->where('username', 'LIKE', '%' . $filterData['userName'] . '%');
                }
            )
            ->when(
                isset($filterData['role']),
                function ($query) use ($filterData) {
                    $query->where('admin_role', $filterData['role']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->get();
    }
}
