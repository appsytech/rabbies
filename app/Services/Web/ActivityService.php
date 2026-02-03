<?php

namespace App\Services\Web;

use App\Models\Admin\Activity;
use App\Repositories\Web\ActivityRepository;
use Illuminate\Database\Eloquent\Collection;

class ActivityService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ActivityRepository $activityRepo
    ) {}

    /* ============================================================================
     |Retrieve activities filtered by type and active status.
     ==============================================================================*/
    public function getActivitiesByType(string $type = 'current', ?array $filterData = null,?array $selectedColumns = []): ?Collection
    {
        return $this->activityRepo->getActivitiesByType($type, $filterData,$selectedColumns);
    }

    public function find(string $encryptedId, ?array $selectedColumns = null):?Activity
    {
        $id = decrypt($encryptedId);

        return $this->activityRepo->find($id, $selectedColumns);
    }
}
