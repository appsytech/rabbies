<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Admin;
use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
    | Create a new admin record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Admin
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['userName'],
            'phone' => $data['phone'] ?? null,
            'profile_image' => $data['profileImage'] ?? null,
            'password' => $data['password'] ?? null,
            'admin_role' => $data['adminRole'] ?? null,
            'status' => $data['status'] ?? null,
            'created_at' => Carbon::now(),
        ]);
    }

    /* ============================================================================
    |   Fetch a single admin record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Admin
    {
        return Admin::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
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
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
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
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('sort', 'asc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing admin record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Admin::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing admin record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return Admin::where('id', $id)->delete();
    }

    /* ================================================
     |count admin data based on the given filters
     ==================================================*/
    public function countByFilters(?array $filters = null): int
    {
        return Admin::when(
            isset($filters['adminRole']),
            function ($query) use ($filters) {
                return $query->where('admin_role', $filters['adminRole']);
            }
        )
            ->when(
                isset($filters['exceptAdminRole']),
                function ($query) use ($filters) {
                    return $query->where('admin_role', '!=', $filters['exceptAdminRole']);
                }
            )
            ->count();
    }
}
