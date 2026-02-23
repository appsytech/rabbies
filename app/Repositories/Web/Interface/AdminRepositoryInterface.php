<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminRepositoryInterface
{
    /* ============================================================================
    |   Fetch a single admin record by its credentials like email, phone etc.
    ==============================================================================*/
    public function findByCredential(string $credential, ?array $selectedColumns = null): ?Admin;

    /* ============================================================================
    |   Fetch a single admin record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Admin;

    /* ============================================================================
    |  Fetch admin with optional filters and selected columns.
    ==============================================================================*/
    public function getAdmins(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;
}
