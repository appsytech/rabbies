<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ActivityService;
use App\Services\Web\LayoutConfigService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{

    public function __construct(
        protected ActivityService $activityService,
        protected LayoutConfigService $layoutConfigService
    ) {}

    public function index()
    {
        $data = [
            'activities' => $this->activityService->getActivities(),
            'config' => $this->layoutConfigService->findByKey('activity')
        ];

        return view('web.pages.activity.index', compact('data'));
    }


    public function show(Request $request)
    {
        $activity = $this->activityService->find($request->id);

        $data = [
            'activity' => $activity,
            'relatedActivities' => $this->activityService->getActivities([
                'exceptId' => $activity->id,
                'limit' => 5,
            ], ['id', 'title', 'author', 'created_at', 'images']),
            'config' => $this->layoutConfigService->findByKey('activity')
        ];

        return view('web.pages.activity.show', compact('data'));
    }
}
