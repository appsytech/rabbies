<?php

namespace App\Services\Admin;

use App\Models\Admin\Notice;
use App\Repositories\Admin\Interfaces\NoticeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NoticeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected NoticeRepositoryInterface $noticeRepo
    ) {}

    /* =============================================================
     | Create a new notice record.
    ================================================================*/
    public function create($request): ?Notice
    {
        $data = [
            'title' => $request->title,
            'noticeType' => $request->notice_type,
            'sort' => $request->sort,
            'description' => $request->description,
            'extraLink1' => $request->extra_link_1,
            'status' => $request->status,
            'createdBy' => 1, // update it to use auth after creating login system
        ];

        return $this->noticeRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single notice record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Notice
    {
        return $this->noticeRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch notices with optional filters and selected columns.
    ==============================================================================*/
    public function getNotices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->noticeRepo->getNotices($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing notice record .
    ==============================================================================*/
    public function update($request): bool
    {
        $noticeId = $request->id;

        $data = [
            'title' => $request->title,
            'notice_type' => $request->notice_type,
            'sort' => $request->sort,
            'description' => $request->description,
            'extraLink1' => $request->extra_link_1,
            'status' => $request->status,
        ];

        return $this->noticeRepo->updateColumns($noticeId, $data);
    }

    /* ============================================================================
    | Toggle notice status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $notice = $this->noticeRepo->find($id, ['id', 'status']);

        if (! $notice) {
            return false;
        }

        return $this->noticeRepo->updateColumns($id, [
            'status' => ! $notice->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an notice record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->noticeRepo->delete($id);
    }
}
