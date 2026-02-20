<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Publication;
use App\Repositories\Admin\Interfaces\PublicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
    | Create a new publication record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Publication
    {
        return Publication::create($data);
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

    /* ============================================================================
    |  Fetch publication with optional filters and selected columns.
    ==============================================================================*/
    public function getPublications(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return Publication::when(
            isset($filterData['type']),
            function ($query) use ($filterData) {
                $query->where('type', 'LIKE', '%'.$filterData['type'].'%');
            }
        )
            ->when(
                isset($filterData['author']),
                function ($query) use ($filterData) {
                    $query->where('author', 'LIKE', '%'.$filterData['author'].'%');
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate($filterData['paginateLimit'] ?? 10);
    }

    /* ============================================================================
    |Update specific columns of an existing publication record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Publication::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing publication record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return Publication::where('id', $id)->delete();

    }
}
