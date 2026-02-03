<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Activity;

interface ActivityRepositoryInterface
{
    /* ============================================================================
       |Find an Activity by its ID with optional columns selection.
       ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Activity;

    /* ============================================================================
        |Retrieve activities filtered by type and active status.
    ==============================================================================*/
    public function getActivitiesByType(string $type = 'current', ?array $filterData = null, ?array $selectedColumns = []);
}
