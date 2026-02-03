<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Inquiry;

interface InquiryRepositoryInterface
{
       /* ============================================================================
     | Create a new inquiry record in the database and returns the created record.
     ==============================================================================*/
    public function create(array $data): ?Inquiry;
}
