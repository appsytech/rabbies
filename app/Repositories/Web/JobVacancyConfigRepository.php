<?php

namespace App\Repositories\Web;

use App\Models\Admin\JobVacancyConfig;
use App\Repositories\Web\Interface\JobVacancyConfigRepositoryInterface;
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
    |   Fetch a single job vacancy record by its primary ID.
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
                isset($filterData['limit']) && is_numeric($filterData['limit']),
                function ($query) use ($filterData) {
                    return $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', 'ACTIVE')
            ->orderBy('sort', 'asc')
            ->get();
    }
}
