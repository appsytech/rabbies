<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\LayoutConfig;

interface LayoutConfigRepositoryInterface
{
    /* ============================================================================
    |   Fetch a single layout config record by its key.
    ==============================================================================*/
    public function findByKey(string $key, ?array $selectedColumns = null): ?LayoutConfig;

}
