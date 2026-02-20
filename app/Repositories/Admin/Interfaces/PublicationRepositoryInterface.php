<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Publication;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PublicationRepositoryInterface
{
    /* ============================================================================
    | Create a new publication record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Publication;

    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Publication;

    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;

    /* ============================================================================
    |Update specific columns of an existing publication record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing publication record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
