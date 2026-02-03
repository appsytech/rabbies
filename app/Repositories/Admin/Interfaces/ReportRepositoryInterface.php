<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Report;
use Illuminate\Database\Eloquent\Collection;

interface ReportRepositoryInterface
{
    /* ============================================================================
    | Create a new report record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Report;

    /* ============================================================================
    |   Fetch a single report record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Report;

    /* ============================================================================
    |   Fetch a single report record by its Type.
    ==============================================================================*/
    public function findByType(string $type, ?array $selectedColumns = null): ?Report;

    /* ============================================================================
    |  Fetch reports with optional filters and selected columns.
    ==============================================================================*/
    public function getReports(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing report record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ============================================================================
    | Increment the total counter by 1 based on the given type.  types:- 1 = Teacher , 2 = Award , 3 = student
    ==============================================================================*/
    public function incrementTotalForType(string $type): bool;

    /* ============================================================================
    | Decrement the total counter by 1 based on the given type.  types:- 1 = Teacher , 2 = Award , 3 = student
    ==============================================================================*/
    public function decrementTotalForType(string $type): bool;
}
