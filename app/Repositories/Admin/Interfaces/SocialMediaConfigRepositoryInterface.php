<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\SocialMediaConfig;
use Illuminate\Pagination\LengthAwarePaginator;

interface SocialMediaConfigRepositoryInterface
{
    /* ============================================================================
    | Create a new social media config record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SocialMediaConfig;

    /* ============================================================================
    |   Fetch a single social media config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SocialMediaConfig;


    /* ============================================================================
    |  Fetch social media config with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing social media config record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing social media config record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
