<?php

namespace App\Repositories\Web;

use App\Models\Admin\Admin;
use App\Repositories\Web\Interface\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |   Fetch a single admin record by its credentials like email, phone etc.
    ==============================================================================*/
    public function findByCredential(string $credential, ?array $selectedColumns = null): ?Admin
    {
        return Admin::where('email', $credential)
            ->orWhere('username', $credential)
            ->orWhere('phone', $credential)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }
}
