<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\SchoolAnnouncement;
use Illuminate\Database\Eloquent\Collection;

interface SchoolAnnouncementRepositoryInterface
{
    /* ============================================================================
    | Create a new school announcement record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?SchoolAnnouncement;

    /* ============================================================================
    |   Fetch a single school announcement record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolAnnouncement;

    /* ============================================================================
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing school announcement record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing school announcement record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
