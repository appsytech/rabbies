<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\AboutFeature;
use Illuminate\Pagination\LengthAwarePaginator;

interface AboutFeatureRepositoryInterface
{

    /* ============================================================================
    | Create a new About Feature record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?AboutFeature;

    /* ============================================================================
    |   Fetch a single About Feature record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutFeature;

    /* ============================================================================
    |  Fetch About Feature with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing About Feature record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing About Feature record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
