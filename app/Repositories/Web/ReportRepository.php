<?php

namespace App\Repositories\Web;

use App\Repositories\Web\Interface\ReportRepositoryInterface;
use App\Models\Admin\Report;


class ReportRepository implements ReportRepositoryInterface
{ 
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    |   Fetch a single report record by its Type.
    ==============================================================================*/
    public function findByType(string $type, ?array $selectedColumns = null): ?Report
    {
        return Report::where('type', $type)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

}
