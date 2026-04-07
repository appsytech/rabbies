<?php

namespace App\Services\Web;

use App\Repositories\Web\Interface\SocialMediaConfigRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SocialMediaConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SocialMediaConfigRepositoryInterface $socialMediaConfigRepo
    ) {}

    /* ============================================================================
    |  Fetch social media config with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->socialMediaConfigRepo->getSocialMediaConfigs($filterData, $selectedcolumns);
    }
}
