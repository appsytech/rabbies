<?php

namespace App\Services\Web;

use App\Models\Admin\LayoutConfig;
use App\Repositories\Web\Interface\LayoutConfigRepositoryInterface;

class LayoutConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected LayoutConfigRepositoryInterface $layoutConfigRepo
    ) {
        //
    }

    /* ============================================================================
    |   Fetch a single layout config record by its key.
    ==============================================================================*/
    public function findByKey(string $key, ?array $selectedColumns = null): ?LayoutConfig
    {
        return $this->layoutConfigRepo->findByKey($key, $selectedColumns);
    }
}
