<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ClassInfo;
use App\Repositories\Admin\Interfaces\ClassInfoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ClassInfoRepository implements ClassInfoRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new classes info record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ClassInfo
    {
        return ClassInfo::create($data);
    }

    /* ============================================================================
    |   Fetch a single classes info record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassInfo
    {
        return ClassInfo::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch classes info with optional filters and selected columns.
    ==============================================================================*/
    public function getClassInfos(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return ClassInfo::when(
            isset($filterData['grade']),
            function ($query) use ($filterData) {
                $query->where('grade', 'LIKE', '%'.$filterData['grade'].'%');
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
    |  Fetch all the classes with no fee record added.
    ==============================================================================*/
    public function getClassesWithoutFee(?array $filterData = null, ?array $selectedColumns = null): ?Collection
    {
        return ClassInfo::whereNotIn('id', function ($query) {
            $query->select('class_id')
                ->from('classes_fee');
        })
            ->when(
                isset($filterData['limit']) && is_numeric($filterData['limit']),
                function ($query) use ($filterData) {
                    return $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an classes info notice record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return ClassInfo::where('id', $id)->update($data);
    }

    /* ================================================
    |Delete existing classes info record by its id.
    ==================================================*/
    public function delete(int $id): bool
    {
        return ClassInfo::where('id', $id)->delete();
    }
}
