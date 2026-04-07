<?php

namespace App\Repositories\Web\Interface;

use Illuminate\Database\Eloquent\Collection;

interface SocialMediaConfigRepositoryInterface
{
    /* ============================================================================
    |  Fetch social media config with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;
}
