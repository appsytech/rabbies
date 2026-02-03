<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ExternalWonAward;
use App\Repositories\Admin\Interfaces\ExternalWonAwardRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ExternalWonAwardRepository implements ExternalWonAwardRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new external won award record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?ExternalWonAward
    {
        return ExternalWonAward::create($data);
    }

    /* ============================================================================
    |   Fetch a single external won award record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ExternalWonAward
    {
        return ExternalWonAward::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch external won awards with optional filters and selected columns.
    ==============================================================================*/
    public function getExternalWonAwards(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return ExternalWonAward::when(
            isset($filterData['awardName']),
            function ($query) use ($filterData) {
                $query->where('award_name', 'LIKE', '%'.$filterData['awardName'].'%');
            }
        )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing external won award record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return ExternalWonAward::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing external won award record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return ExternalWonAward::where('id', $id)->delete();

    }
}
