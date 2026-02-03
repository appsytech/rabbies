<?php

namespace App\Repositories\Admin;

use App\Models\Admin\StaffHomepageMessage;
use App\Repositories\Admin\Interfaces\StaffHomepageMessageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StaffHomepageMessageRepository implements StaffHomepageMessageRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new staff homepage message record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?StaffHomepageMessage
    {
        return StaffHomepageMessage::create($data);
    }

    /* ============================================================================
    |   Fetch a single staff homepage message record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StaffHomepageMessage
    {
        return StaffHomepageMessage::where('msg_id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch staff homepage message  with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffMessages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return StaffHomepageMessage::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%'.$filterData['name'].'%');
            }
        )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
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
    |Update specific columns of an existing staff homepage message  record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return StaffHomepageMessage::where('msg_id', $id)->update($data);
    }

    /* ================================================
     |Delete existing staff homepage message  record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return StaffHomepageMessage::where('msg_id', $id)->delete();
    }
}
