<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\LogMoney;
use Illuminate\Database\Eloquent\Collection;

interface LogMoneyRepositoryInterface
{
    /*============================================================================
    | Create a new log money record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?LogMoney;

    /* ============================================================================
    |  Fetch log money records with optional filters and selected columns.
    ==============================================================================*/
    public function getMoneyLogs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
