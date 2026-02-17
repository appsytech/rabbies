<?php

namespace App\Repositories\Web;

use App\Models\Admin\AboutUs;
use App\Repositories\Web\Interface\AboutUsRepositoryInterface;

class AboutUsRepository implements AboutUsRepositoryInterface
{



    /* ============================================================================
    |  Fetch first about us.
    ==============================================================================*/
    public function findFirstAboutUs(?array $selectedColumns = null): ?AboutUs
    {
        return AboutUs::when(
            isset($selectedColumns) && count($selectedColumns) >= 1,
            function ($query) use ($selectedColumns) {
                return $query->select($selectedColumns);
            }
        )
            ->first();
    }
}
