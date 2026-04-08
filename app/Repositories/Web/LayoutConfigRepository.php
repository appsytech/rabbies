<?php

namespace App\Repositories\Web;

use App\Models\Admin\LayoutConfig;
use App\Repositories\Web\Interface\LayoutConfigRepositoryInterface;

class LayoutConfigRepository implements LayoutConfigRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /* ============================================================================
    |   Fetch a single layout config record by its key.
    ==============================================================================*/
    public function findByKey(string $key, ?array $selectedColumns = null): ?LayoutConfig
    {
        return LayoutConfig::where('key', $key)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->where('status', true)
            ->first();
    }
}
