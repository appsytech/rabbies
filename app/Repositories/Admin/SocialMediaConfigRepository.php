<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SocialMediaConfig;
use App\Repositories\Admin\Interfaces\SocialMediaConfigRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class SocialMediaConfigRepository implements SocialMediaConfigRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}


    /* ============================================================================
    | Create a new social media config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SocialMediaConfig
    {
        return SocialMediaConfig::create($data);
    }

    /* ============================================================================
    |   Fetch a single social media config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SocialMediaConfig
    {
        return SocialMediaConfig::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }


    /* ============================================================================
    |  Fetch social media config with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {

        return SocialMediaConfig::when(
            isset($filterData['name']),
            function ($query) use ($filterData) {
                $query->where('name', 'LIKE', '%' . $filterData['name'] . '%');
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
            ->orderBy('sort', 'asc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing social media config record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return SocialMediaConfig::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing social media config record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return SocialMediaConfig::where('id', $id)->delete();
    }
}
