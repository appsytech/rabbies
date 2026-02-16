<?php

namespace App\Repositories\Web;

use App\Models\Admin\Publication;
use App\Repositories\Web\Interface\PublicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PublicationRepository implements PublicationRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Publication::when(
            isset($filterData['type']),
            function ($query) use ($filterData) {
                $query->where('type', 'LIKE', '%' . $filterData['type'] . '%');
            }
        )
            ->when(
                isset($filterData['exceptId']) && is_numeric($filterData['exceptId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['exceptId']);
                }
            )
            ->when(
                isset($filterData['author']),
                function ($query) use ($filterData) {
                    $query->where('author', 'LIKE', '%' . $filterData['author'] . '%');
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /* ============================================================================
    |   Fetch a single publication record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Publication
    {
        return Publication::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }
}
