<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SchoolShareHolder;
use App\Repositories\Admin\Interfaces\SchoolShareHolderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolShareHolderRepository implements SchoolShareHolderRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new school shareholder record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolShareHolder
    {
        return SchoolShareHolder::create($data);
    }

    /* ============================================================================
    |   Fetch a single school shareholder record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolShareHolder
    {
        return SchoolShareHolder::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch school shareholder with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolShareHolders(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolShareHolder::when(
            isset($filterData['fullName']),
            function ($query) use ($filterData) {
                $query->where('full_name', 'LIKE', '%'.$filterData['fullName'].'%');
            }
        )
            ->when(
                isset($filterData['email']),
                function ($query) use ($filterData) {
                    $query->where('email', 'LIKE', '%'.$filterData['email'].'%');

                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderByDesc('created_at')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing school shareholder record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return SchoolShareHolder::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing school shareholder record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return SchoolShareHolder::where('id', $id)->delete();

    }

    /* ====================================================================
    |Get total investment from the latest shareholder record by phone number.
    =======================================================================*/
    public function getTotalInvestmentByPhone(string $phone): ?float
    {
        return SchoolShareHolder::where('phone', $phone)
            ->orderByDesc('created_at')
            ->value('total_investment');
    }

    /* ====================================================================
    | Calculate total investment dynamically by summing all invested_now values.
    =======================================================================*/
    public function getInvestmentSumByPhone(string $phone): float
    {
        return SchoolShareHolder::where('phone', $phone)
            ->sum('invested_now');
    }
}
