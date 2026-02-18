<?php

namespace App\Services\Web;

use App\Models\Admin\Activity;
use App\Repositories\Web\Interface\ActivityRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ActivityRepositoryInterface $activityRepo
    ) {}

    /* ============================================================================
     |Retrieve activities with active status.
     ==============================================================================*/
    public function getActivities(?array $filterData = null, ?array $selectedColumns = []): ?LengthAwarePaginator
    {
        return $this->activityRepo->getActivities($filterData, $selectedColumns);
    }

    public function find(string $encryptedId, ?array $selectedColumns = null): ?Activity
    {
        $id = decrypt($encryptedId);

        return $this->activityRepo->find($id, $selectedColumns);
    }
}
