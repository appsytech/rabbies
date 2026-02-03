<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\ExternalWonAward;
use Illuminate\Database\Eloquent\Collection;

interface ExternalWonAwardRepositoryInterface
{
    /* ============================================================================
    | Create a new external won award record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ExternalWonAward;

    /* ============================================================================
    |   Fetch a single external won award record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ExternalWonAward;

    /* ============================================================================
    |  Fetch external won awards with optional filters and selected columns.
    ==============================================================================*/
    public function getExternalWonAwards(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing external won award record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing external won award record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
