<?php

namespace App\Services\Web;

use App\Models\Admin\Report;
use App\Repositories\Web\Interface\ReportRepositoryInterface;

class ReportService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ReportRepositoryInterface $reportRepo
    ) {}

    /* ============================================================================
    |   Fetch a single report record by its Type.
    ==============================================================================*/
    public function findByType(string $type, ?array $selectedColumns = null): ?Report
    {
        return $this->reportRepo->findByType($type, $selectedColumns);
    }
}
