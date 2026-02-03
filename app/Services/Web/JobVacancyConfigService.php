<?php

namespace App\Services\Web;

use App\Models\Admin\JobVacancyConfig;
use App\Repositories\Web\Interface\JobVacancyConfigRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class JobVacancyConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected JobVacancyConfigRepositoryInterface $jobVacancyRepo
    ) {}

    /* ============================================================================
    |   Fetch a single job vacancy record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobVacancyConfig
    {
        return $this->jobVacancyRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch vacancy config record with optional filters and selected columns.
    ==============================================================================*/
    public function getVacancies(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->jobVacancyRepo->getVacancies($filterData, $selectedcolumns);
    }
}
