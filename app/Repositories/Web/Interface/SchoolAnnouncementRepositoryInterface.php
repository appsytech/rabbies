<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface SchoolAnnouncementRepositoryInterface
{
    /* ============================================================================
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
