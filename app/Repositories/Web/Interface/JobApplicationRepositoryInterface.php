<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\JobApplication;

interface JobApplicationRepositoryInterface
{
    /* ============================================================================
     | Create a new job application record in the database and returns the created record.
     ==============================================================================*/
    public function create(array $data): ?JobApplication;
}
