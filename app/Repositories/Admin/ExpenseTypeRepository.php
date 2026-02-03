<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ExpenseType;
use App\Repositories\Admin\Interfaces\ExpenseTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ExpenseTypeRepository implements ExpenseTypeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new expense type record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ExpenseType
    {
        return ExpenseType::create($data);
    }

    /* ============================================================================
    |  Fetch expense type with optional filters and selected columns.
    ==============================================================================*/
    public function getExpenseTypes(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return ExpenseType::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%'.$filterData['name'].'%');
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

    /* ================================================
     |Delete existing expense type record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return ExpenseType::where('id', $id)->delete();
    }
}
