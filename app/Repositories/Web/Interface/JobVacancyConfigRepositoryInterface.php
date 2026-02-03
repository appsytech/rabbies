<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\JobVacancyConfig;
use Illuminate\Database\Eloquent\Collection;

interface JobVacancyConfigRepositoryInterface
{
    /* ============================================================================
       |   Fetch a single vacancy config record by its primary ID.
       ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobVacancyConfig;

    /* ============================================================================
    |  Fetch vacancy configs with optional filters and selected columns.
    ==============================================================================*/
    public function getVacancies(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
