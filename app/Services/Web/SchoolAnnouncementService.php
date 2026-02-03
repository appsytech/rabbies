<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\SchoolAnnouncementRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolAnnouncementService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SchoolAnnouncementRepositoryInterface $schoolAnnouncementRepo
    ) {
        //
    }

    /* ============================================================================
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->schoolAnnouncementRepo->getSchoolAnnouncements($filterData, $selectedcolumns);
    }
}
