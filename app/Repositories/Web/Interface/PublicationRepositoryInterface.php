<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Publication;

use Illuminate\Pagination\LengthAwarePaginator;

interface PublicationRepositoryInterface
{
    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator;


    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Publication;
}
