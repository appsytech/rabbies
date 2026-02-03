<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\SchoolShareHolder;
use Illuminate\Database\Eloquent\Collection;

interface SchoolShareHolderRepositoryInterface
{
    /* ============================================================================
    | Create a new school shareholder record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolShareHolder;

    /* ============================================================================
    |   Fetch a single school shareholder record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolShareHolder;

    /* ============================================================================
    |  Fetch school shareholder with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolShareHolders(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing school shareholder record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing school shareholder record by its id.
     ==================================================*/
    public function delete(int $id): bool;

    /* ====================================================================
    |Get total investment from the latest shareholder record by phone number.
    =======================================================================*/
    public function getTotalInvestmentByPhone(string $phone): ?float;

    /* ====================================================================
    | Calculate total investment dynamically by summing all invested_now values.
    =======================================================================*/
    public function getInvestmentSumByPhone(string $phone): float;
}
