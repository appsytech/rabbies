<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AboutFeature;
use App\Repositories\Admin\Interfaces\AboutFeatureRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AboutFeatureRepository implements AboutFeatureRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }



    /* ============================================================================
    | Create a new About Feature record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?AboutFeature
    {
        return AboutFeature::create($data);
    }

    /* ============================================================================
    |   Fetch a single About Feature record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutFeature
    {
        return AboutFeature::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch About Feature with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return AboutFeature::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%' . $filterData['title'] . '%');
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
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing About Feature record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return AboutFeature::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing About Feature record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return AboutFeature::where('id', $id)->delete();
    }
}
