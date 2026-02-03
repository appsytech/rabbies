<?php

namespace App\Services\Web;

use App\Models\Admin\Notice;
use App\Repositories\Web\Interface\NoticeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NoticeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected NoticeRepositoryInterface $noticeRepo
    ) {}

    /* ============================================================================
    | Fetch a single notice record by its primary ID.
    ==============================================================================*/
    public function find(string $encryptedId, ?array $selectedColumns = null): ?Notice
    {
        $id = decrypt($encryptedId);

        return $this->noticeRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch active notices with optional filters and selected columns.
    ==============================================================================*/
    public function getNotices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {

        return $this->noticeRepo->getNotices($filterData, $selectedcolumns);
    }
}
