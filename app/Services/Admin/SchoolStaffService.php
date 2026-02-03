<?php

namespace App\Services\Admin;

use App\Models\Admin\SchoolStaff;
use App\Repositories\Admin\Interfaces\SchoolStaffRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class SchoolStaffService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SchoolStaffRepositoryInterface $schoolStaffRepo
    ) {}

    /* =============================================================
    | Create a new staff record.
    ================================================================*/
    public function create($request): ?SchoolStaff
    {
        $data = [
            'name' => $request->name,
            'gender' => $request->gender ?? null,
            'type' => $request->type,
            'dateOfBirth' => $request->date_of_birth ?? null,
            'email' => $request->email ?? null,
            'phoneNumber' => $request->phone_number ?? null,
            'address' => $request->address ?? null,
            'fbProfile' => $request->fb_profile ?? null,
            'instagramProfile' => $request->insta_profile ?? null,
            'position' => $request->position,
            'status' => $request->status ?? null,
        ];

        if ($request->hasFile('profile_image')) {
            $data['profileImage'] = $request->file('profile_image')->store('assets/images/staffs', 'public');
        }

        return $this->schoolStaffRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single staff record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolStaff
    {
        return $this->schoolStaffRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->schoolStaffRepo->getStaffs($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing staff record .
    ==============================================================================*/
    public function update($request): bool
    {
        $staffId = $request->id;
        $staff = $this->schoolStaffRepo->find($staffId, ['profile_image']);

        $data = [
            'full_name' => $request->name,
            'gender' => $request->gender ?? null,
            'type' => $request->type,
            'date_of_birth' => $request->date_of_birth ?? null,
            'email' => $request->email ?? null,
            'phone_number' => $request->phone_number ?? null,
            'address' => $request->address ?? null,
            'fb_profile' => $request->fb_profile ?? null,
            'instagram_profile' => $request->insta_profile ?? null,
            'position' => $request->position,
            'status' => $request->status ?? null,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('profile_image')) {

            if (Storage::disk('public')->exists($staff->profile_image)) {
                Storage::disk('public')->delete($staff->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')->store('assets/images/staffs', 'public');
        }

        return $this->schoolStaffRepo->updateColumns($staffId, $data);

    }

    /* ============================================================================
    | Permanently delete an staff along with its stored image.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $staff = $this->schoolStaffRepo->find($id, ['profile_image']);

        if (! $staff) {
            return false;
        }

        if (! empty($staff->profile_image) && Storage::disk('public')->exists($staff->profile_image)) {
            Storage::disk('public')->delete($staff->profile_image);
        }

        return $this->schoolStaffRepo->delete($id);
    }
}
