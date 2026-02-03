<?php

namespace App\Repositories\Web;

use App\Models\Admin\SchoolAnnouncement;
use App\Repositories\Web\Interface\SchoolAnnouncementRepositoryInterface;
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
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return SchoolAnnouncement::where('status', true)
            ->whereNotNull('image')
            ->when(
                isset($filterData['limit']) && is_numeric($filterData['limit']),
                function ($query) use ($filterData) {
                    return $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($filterData['startDate']),
                function ($query) use ($filterData) {
                    return $query->where('publish_date', '<=', $filterData['startDate']);
                }
            )
            ->when(
                isset($filterData['endDate']),
                function ($query) use ($filterData) {
                    return $query->where('expiry_date', '>=', $filterData['endDate']);
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
}
