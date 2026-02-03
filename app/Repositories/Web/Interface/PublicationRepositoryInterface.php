<?php

namespace App\Repositories\Web\Interface;
use App\Models\Admin\Publication;


use Illuminate\Database\Eloquent\Collection;

interface PublicationRepositoryInterface
{
    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;


    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Publication;

}
