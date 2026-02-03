<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Package;
use App\Repositories\Admin\Interfaces\PackageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PackageRepository implements PackageRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new package record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Package
    {
        return Package::create($data);
    }

    /* ============================================================================
    |   Fetch a single package record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Package
    {
        return Package::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch package with optional filters and selected columns.
    ==============================================================================*/
    public function getPackages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Package::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%'.$filterData['title'].'%');
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
    |Update specific columns of an existing package record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Package::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing package record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return Package::where('id', $id)->delete();
    }
}
