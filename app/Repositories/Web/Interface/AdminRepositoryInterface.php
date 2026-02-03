<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Admin;

interface AdminRepositoryInterface
{
    /* ============================================================================
    |   Fetch a single admin record by its credentials like email, phone etc.
    ==============================================================================*/
    public function findByCredential(string $credential, ?array $selectedColumns = null): ?Admin;
}
