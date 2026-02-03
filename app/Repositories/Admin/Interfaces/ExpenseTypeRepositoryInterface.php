<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\ExpenseType;
use Illuminate\Database\Eloquent\Collection;

interface ExpenseTypeRepositoryInterface
{
    /* ============================================================================
    | Create a new expense type record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ExpenseType;

    /* ============================================================================
    |  Fetch expense type with optional filters and selected columns.
    ==============================================================================*/
    public function getExpenseTypes(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ================================================
     |Delete existing expense type record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
