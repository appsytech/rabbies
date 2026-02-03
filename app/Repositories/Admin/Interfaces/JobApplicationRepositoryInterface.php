<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\JobApplication;
use Illuminate\Database\Eloquent\Collection;

interface JobApplicationRepositoryInterface
{
    /* ============================================================================
    | Fetch a single job applications record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobApplication;

    /* ============================================================================
    | Fetch job applications with optional filters and selected columns.
    ==============================================================================*/
    public function getJobApplications(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing job applications record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing job applications record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
