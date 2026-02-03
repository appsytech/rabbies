<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\JobVacancyConfig;
use Illuminate\Database\Eloquent\Collection;

interface JobVacancyConfigRepositoryInterface
{
    /* ============================================================================
    | Create a new vacancy config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?JobVacancyConfig;

    /* ============================================================================
    |   Fetch a single vacancy config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobVacancyConfig;

    /* ============================================================================
    |  Fetch vacancy configs with optional filters and selected columns.
    ==============================================================================*/
    public function getVacancies(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing vacancy config record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing vacancy config record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
