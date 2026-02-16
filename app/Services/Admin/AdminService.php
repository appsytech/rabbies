<?php

namespace App\Services\Admin;

use App\Models\Admin\Admin;
use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AdminRepositoryInterface $adminRepo,
    ) {
        //
    }

    /* =============================================================
    | Create a new admin record.
    ================================================================*/
    public function create($request)
    {
        if ($request->admin_role != 4 && $request->admin_role != 5) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:8|max:40|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'code' => 422,
                    'messages' => ['Validation Error'],
                    'errors' => $validator->errors()->all(),
                    'data' => null,
                ], 422);
            }
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userName' => $request->username ?? null,
            'phone' => $request->phone ?? null,
            'password' => $request->password ? bcrypt($request->password) : null,
            'adminRole' => $request->admin_role ?? null,
            'status' => $request->status ?? null,
        ];

        if ($request->hasFile('profile_image')) {
            $data['profileImage'] = $request->file('profile_image')->store('assets/images/admins', 'public');
        }

        $isCreated = $this->adminRepo->create($data);

        if ($isCreated) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'messages' => ['Admin Created Successfully'],
                'errors' => null,
                'data' => null,
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'code' => 500,
                'messages' => ['Something went wrong'],
                'errors' => ['Something went wrong'],
                'data' => null,
            ], 500);
        }
    }

    /* ============================================================================
    |   Fetch a single admin record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Admin
    {
        return $this->adminRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch admins with optional filters and selected columns.
    ==============================================================================*/
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->adminRepo->getAdmins($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing admin record .
    ==============================================================================*/
    public function update($request): bool
    {
        $adminId = $request->id;
        $admin = $this->adminRepo->find($adminId, ['profile_image']);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userName' => $request->username ?? null,
            'phone' => $request->phone ?? null,
            'admin_role' => $request->admin_role ?? null,
            'status' => $request->status ?? null,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('profile_image')) {
            if (isset($admin->profile_image) && Storage::disk('public')->exists($admin->profile_image)) {
                Storage::disk('public')->delete($admin->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('assets/images/admins', 'public');
        }

        if (! empty($request->password)) {
            $data['password'] = bcrypt($request->password); // Hash it before saving
        }

        return $this->adminRepo->updateColumns($adminId, $data);
    }

    /* ============================================================================
    | Toggle admin status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $notice = $this->adminRepo->find($id, ['id', 'status']);

        if (! $notice) {
            return false;
        }

        return $this->adminRepo->updateColumns($id, [
            'status' => ! $notice->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an admin.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $admin = $this->adminRepo->find($id, ['profile_image']);

        if (! empty($admin->profile_image) && Storage::disk('public')->exists($admin->profile_image)) {
            Storage::disk('public')->delete($admin->profile_image);
        }

        return $this->adminRepo->delete($id);
    }

    /* ================================================
     |count admin data based on the given filters
     ==================================================*/
    public function countByFilters(?array $filters = null): int
    {
        return $this->adminRepo->countByFilters($filters);
    }
}
