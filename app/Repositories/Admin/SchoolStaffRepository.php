<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SchoolStaff;
use App\Repositories\Admin\Interfaces\SchoolStaffRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class SchoolStaffRepository implements SchoolStaffRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new staff record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolStaff
    {
        return SchoolStaff::create([
            'full_name' => $data['name'],
            'gender' => $data['gender'] ?? null,
            'type' => $data['type'],
            'date_of_birth' => $data['dateOfBirth'] ?? null,
            'email' => $data['email'] ?? null,
            'phone_number' => $data['phoneNumber'] ?? null,
            'address' => $data['address'] ?? null,
            'fb_profile' => $data['fbProfile'] ?? null,
            'instagram_profile' => $data['instagramProfile'] ?? null,
            'profile_image' => $data['profileImage'] ?? null,
            'position' => $data['position'],
            'status' => $data['status'] ?? null,
            'created_at' => Carbon::now(),
        ]);
    }

    /* ============================================================================
    |   Fetch a single staff record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolStaff
    {
        return SchoolStaff::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch staffs with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolStaff::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('full_name', 'LIKE', '%'.$filterData['name'].'%');
            }
        )
            ->when(
                isset($filterData['position']),
                function ($query) use ($filterData) {
                    $query->where('position', 'LIKE', '%'.$filterData['position'].'%');
                }
            )
            ->when(
                isset($filterData['phoneNumber']),
                function ($query) use ($filterData) {
                    $query->where('phone_number', 'LIKE', '%'.$filterData['phoneNumber'].'%');
                }
            )
            ->when(
                isset($filterData['type']),
                function ($query) use ($filterData) {
                    $query->where('type', $filterData['type']);
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

    /* ============================================================================
    |Update specific columns of an existing staff record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return SchoolStaff::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing staff record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return SchoolStaff::where('id', $id)->delete();
    }
}
