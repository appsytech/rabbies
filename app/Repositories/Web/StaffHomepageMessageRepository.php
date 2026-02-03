<?php

namespace App\Repositories\Web;

use App\Models\Admin\StaffHomepageMessage;
use App\Repositories\Web\Interface\StaffHomepageMessageRepositoryInterface;
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
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', true)
            ->get();
    }
}
