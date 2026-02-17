<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface AboutFeatureRepositoryInterface
{
    /* ============================================================================
    |  Fetch About Feature with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
