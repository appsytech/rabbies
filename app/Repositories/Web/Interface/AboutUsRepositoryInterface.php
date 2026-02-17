<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\AboutUs;

interface AboutUsRepositoryInterface
{
    /* ============================================================================
    |  Fetch first about us.
    ==============================================================================*/
    public function findFirstAboutUs(?array $selectedColumns = null): ?AboutUs;
}
