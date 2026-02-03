<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ClassFee;
use App\Repositories\Admin\Interfaces\ClassFeeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ClassFeeRepository implements ClassFeeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new classes fee record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ClassFee
    {
        return ClassFee::create($data);
    }

    /* ============================================================================
    |   Fetch a single classes fee record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassFee
    {
        return ClassFee::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch classes fee with optional filters and selected columns.
    ==============================================================================*/
    public function getClassesFee(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return ClassFee::when(
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
    |Update specific columns of an classes fee notice record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return ClassFee::where('id', $id)->update($data);
    }

    /* ================================================
    |Delete existing classes fee record by its id.
    ==================================================*/
    public function delete(int $id): bool
    {
        return ClassFee::where('id', $id)->delete();
    }
}
