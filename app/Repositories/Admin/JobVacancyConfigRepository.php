<?php

namespace App\Repositories\Admin;

use App\Models\Admin\JobVacancyConfig;
use App\Repositories\Admin\Interfaces\JobVacancyConfigRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class JobVacancyConfigRepository implements JobVacancyConfigRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new vacancy config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?JobVacancyConfig
    {
        return JobVacancyConfig::create($data);
    }

    /* ============================================================================
    |   Fetch a single vacancy config record record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobVacancyConfig
    {
        return JobVacancyConfig::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch vacancy config record with optional filters and selected columns.
    ==============================================================================*/
    public function getVacancies(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return JobVacancyConfig::when(
            isset($filterData['position']),
            function ($query) use ($filterData) {
                $query->where('position', 'LIKE', '%'.$filterData['position'].'%');
            }
        )
            ->when(
                isset($filterData['vacancyType']),
                function ($query) use ($filterData) {
                    $query->where('vacancy_type', $filterData['vacancyType']);
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
    |Update specific columns of an existing vacancy config  record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return JobVacancyConfig::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing vacancy config record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return JobVacancyConfig::where('id', $id)->delete();
    }
}
