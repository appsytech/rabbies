<?php

namespace App\Repositories\Web;

use App\Models\Admin\JobApplication;
use App\Repositories\Web\Interface\JobApplicationRepositoryInterface;

class JobApplicationRepository implements JobApplicationRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
     | Create a new job application record in the database and returns the created record.
     ==============================================================================*/
    public function create(array $data): ?JobApplication
    {
        return JobApplication::create($data);
    }
}
