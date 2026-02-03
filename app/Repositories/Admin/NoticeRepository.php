<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Notice;
use App\Repositories\Admin\Interfaces\NoticeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class NoticeRepository implements NoticeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new notice record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Notice
    {
        return Notice::create([
            'title' => $data['title'],
            'notice_type' => $data['noticeType'],
            'sort' => $data['sort'],
            'description' => $data['description'],
            'extraLink1' => $data['extraLink1'],
            'status' => $data['status'],
            'created_by' => $data['createdBy'],
            'created_at' => Carbon::now(),
        ]);
    }

    /* ============================================================================
    |   Fetch a single Notice record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Notice
    {
        return Notice::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch notices with optional filters and selected columns.
    ==============================================================================*/
    public function getNotices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Notice::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%'.$filterData['title'].'%');
            }
        )
            ->when(
                isset($filterData['noticeType']),
                function ($query) use ($filterData) {
                    $query->where('notice_type', $filterData['noticeType']);
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
    |Update specific columns of an existing notice record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Notice::where('id', $id)->update($data);
    }

    /* ================================================
    |Delete existing Notice record by its id.
    ==================================================*/
    public function delete(int $id): bool
    {
        return Notice::where('id', $id)->delete();
    }
}
