<?php

namespace App\Services\Admin;

use App\Models\Admin\Activity;
use App\Repositories\Admin\Interfaces\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ActivityService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ActivityRepositoryInterface $activityRepo,

    ) {}

    /* =============================================================
     | Create a new Activity with optional image upload handling.
     ================================================================*/
    public function create($request): ?Activity
    {
        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->description,
            'sort' => $request->sort,

        ];

        if ($request->hasFile('images')) {
            $data['images'] = $request->file('images')->store('assets/images/activities', 'public');

        }

        return $this->activityRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single Activity record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Activity
    {
        return $this->activityRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |Retrieve activities list with optional filters and column selection.
    ==============================================================================*/
    public function getActivities(?array $filterData = null, ?array $selectedColumns = null): ?Collection
    {
        return $this->activityRepo->getActivities($filterData, $selectedColumns);
    }

    /* ============================================================================
    | Update an existing Activity record with optional image replacement.
    ==============================================================================*/
    public function update($request): bool
    {
        $activityId = $request->id;
        $activity = $this->activityRepo->find($activityId, ['images']);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->description,
            'sort' => $request->sort,
        ];

        if ($request->hasFile('images')) {

            if (Storage::disk('public')->exists($activity->images)) {
                Storage::disk('public')->delete($activity->images);
            }

            $data['images'] = $request->file('images')->store('assets/images/activities', 'public');
        }

        return $this->activityRepo->updateColumns($activityId, $data);

    }

    /* ============================================================================
    | Toggle activity status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $activity = $this->activityRepo->find($id, ['id', 'status']);

        if (! $activity) {
            return false;
        }

        return $this->activityRepo->updateColumns($id, [
            'status' => ! $activity->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an Activity along with its stored image.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $activity = $this->activityRepo->find($id, ['images']);

        if (! $activity) {
            return false;
        }

        if (! empty($activity->images) && Storage::disk('public')->exists($activity->images)) {
            Storage::disk('public')->delete($activity->images);
        }

        return $this->activityRepo->delete($id);
    }
}
