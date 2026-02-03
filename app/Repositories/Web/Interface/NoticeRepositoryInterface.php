<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Notice;
use Illuminate\Database\Eloquent\Collection;

interface NoticeRepositoryInterface
{
    /* ============================================================================
    |  Fetch notices with optional filters and selected columns.
    ==============================================================================*/
    public function getNotices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    | Fetch a single notice record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Notice;
}
