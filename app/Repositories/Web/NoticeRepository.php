<?php

namespace App\Repositories\Web;

use App\Models\Admin\Notice;
use App\Repositories\Web\Interface\NoticeRepositoryInterface;
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
    | Fetch a single notice record by its primary ID.
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
    | Fetch active notices with optional filters and selected columns.
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
                isset($filterData['excludeId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['excludeId']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('created_at', 'desc')
            ->where('status', true)
            ->get();
    }
}
