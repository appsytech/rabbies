<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Service;
use Illuminate\Database\Eloquent\Collection;

interface ServiceRepositoryInterface
{

    /* ============================================================================
    | Create a new Service record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Service;

    /* ============================================================================
    |   Fetch a single Service record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Service;

    /* ============================================================================
    |  Fetch Service with optional filters and selected columns.
    ==============================================================================*/
    public function getServices(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing Service record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing Service record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
