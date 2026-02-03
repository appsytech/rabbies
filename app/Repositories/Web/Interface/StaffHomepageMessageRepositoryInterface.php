<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin\StaffHomepageMessage;


interface StaffHomepageMessageRepositoryInterface
{

/* ============================================================================
    |   Fetch a staff homepage message record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StaffHomepageMessage;

    /* ============================================================================
    |  Fetch staff homepage messages with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffMessages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
