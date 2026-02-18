<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Activity;
use Illuminate\Pagination\LengthAwarePaginator;

interface ActivityRepositoryInterface
{
    /* ============================================================================
       |Find an Activity by its ID with optional columns selection.
       ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Activity;

    /* ============================================================================
     |Retrieve activities with active status.
     ==============================================================================*/
    public function getActivities(?array $filterData = null, ?array $selectedColumns = []): ?LengthAwarePaginator;
}
