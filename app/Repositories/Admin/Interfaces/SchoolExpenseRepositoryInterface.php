<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\SchoolExpense;
use Illuminate\Database\Eloquent\Collection;

interface SchoolExpenseRepositoryInterface
{
    /* ============================================================================
    | Create a new school expense record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolExpense;

    /* ============================================================================
    |   Fetch a single school expense record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolExpense;

    /* ============================================================================
    |  Fetch school expense with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolExpenses(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing school expense record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;
}
