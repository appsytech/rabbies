<?php

namespace App\Services\Admin;

use App\Models\Admin\Report;
use App\Repositories\Admin\Interfaces\ReportRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ReportService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ReportRepositoryInterface $reportRepo
    ) {
        //
    }

    /* ============================================================================
    | Create a new report record in the database and returns the created record.
    ==============================================================================*/
    public function create($request): ?Report
    {
        $data = [
            'type' => $request->type,
        ];

        return $this->reportRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single report record by its Type.
    ==============================================================================*/
    public function findByType(string $type, ?array $selectedColumns = null): ?Report
    {
        return $this->reportRepo->findByType($type, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch reports with optional filters and selected columns.
    ==============================================================================*/
    public function getReports(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->reportRepo->getReports($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Toggle report status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $report = $this->reportRepo->find($id, ['id', 'status']);

        if (! $report) {
            return false;
        }

        return $this->reportRepo->updateColumns($id, [
            'status' => ! $report->status,
        ]);
    }
}
