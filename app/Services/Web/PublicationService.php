<?php

namespace App\Services\Web;

use App\Models\Admin\Publication;
use App\Repositories\Web\Interface\PublicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected PublicationRepositoryInterface $publicationRepo
    ) {}

    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(string $id, ?array $selectedColumns = null): ?Publication
    {
        $id = (int) decrypt($id);
        return $this->publicationRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->publicationRepo->getPublications($filterData, $selectedcolumns);
    }
}
