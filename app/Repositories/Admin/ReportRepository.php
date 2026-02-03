<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Report;
use App\Repositories\Admin\Interfaces\ReportRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
    | Create a new report record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Report
    {
        return Report::create($data);
    }

    /* ============================================================================
    |   Fetch a single report record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Report
    {
        return Report::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
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

    /* ============================================================================
    |  Fetch reports with optional filters and selected columns.
    ==============================================================================*/
    public function getReports(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Report::when(
            isset($filterData['type']),
            function ($query) use ($filterData) {
                $query->where('type', 'LIKE', '%'.$filterData['type'].'%');
            }
        )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing report record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Report::where('id', $id)->update($data);

    }

    /* ============================================================================
    | Increment the total counter by 1 based on the given type.  types:- 1 = Teacher , 2 = Award , 3 = student
    ==============================================================================*/
    public function incrementTotalForType(string $type): bool
    {
        return Report::where([
            ['type', $type],
            ['status', true],
        ])
            ->increment('total');
    }

    /* ============================================================================
    | Decrement the total counter by 1 based on the given type.  types:- 1 = Teacher , 2 = Award , 3 = student
    ==============================================================================*/
    public function decrementTotalForType(string $type): bool
    {
        return Report::where([
            ['type', $type],
            ['status', true],
        ])
            ->where('total', '>', 0)
            ->decrement('total');
    }
}
