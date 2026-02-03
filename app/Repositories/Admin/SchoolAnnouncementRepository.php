<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SchoolAnnouncement;
use App\Repositories\Admin\Interfaces\SchoolAnnouncementRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolAnnouncementRepository implements SchoolAnnouncementRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new school announcement record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolAnnouncement
    {
        return SchoolAnnouncement::create($data);
    }

    /* ============================================================================
    |   Fetch a single school announcement record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolAnnouncement
    {
        return SchoolAnnouncement::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolAnnouncement::when(
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%'.$filterData['title'].'%');
            }
        )
            ->when(
                isset($filterData['category']),
                function ($query) use ($filterData) {
                    $query->where('category', $filterData['category']);
                }
            )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
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
    |Update specific columns of an existing school announcement record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return SchoolAnnouncement::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing school announcement record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return SchoolAnnouncement::where('id', $id)->delete();

    }
}
