<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ActivityService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function __construct(
        protected ActivityService $activityService
    ) {}

    public function show(Request $request): View
    {
        $activity = $this->activityService->find($request->id);

        $data = [
            'activity' => $activity,
            'relatedActivities' => $this->activityService->getActivitiesByType($activity->type, [
                'exceptId' => $activity->id,
                'limit' => 5,
            ], ['id', 'title', 'author', 'created_at', 'images']),
        ];

        return view('web.pages.activity.activity-show', compact('data'));
    }
}
