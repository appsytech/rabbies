<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SchoolExpense;
use App\Repositories\Admin\Interfaces\SchoolExpenseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolExpenseRepository implements SchoolExpenseRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new school expense record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolExpense
    {
        return SchoolExpense::create($data);
    }

    /* ============================================================================
    |   Fetch a single school expense record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolExpense
    {
        return SchoolExpense::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch school expense with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolExpenses(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolExpense::when(
            isset($filterData['expenseTypeName']),
            function ($query) use ($filterData) {
                $query->where('expense_type_name', 'LIKE', '%'.$filterData['expenseTypeName'].'%');
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
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing school expense record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return SchoolExpense::where('id', $id)->update($data);

    }
}
