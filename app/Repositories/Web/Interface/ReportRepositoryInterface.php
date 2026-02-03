<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Report;

interface ReportRepositoryInterface
{
    /* ============================================================================
    |   Fetch a single report record by its Type.
    ==============================================================================*/
    public function findByType(string $type, ?array $selectedColumns = null): ?Report;
}
