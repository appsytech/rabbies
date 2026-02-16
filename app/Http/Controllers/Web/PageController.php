<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Admin\HomeSliderService;
use App\Services\Web\ActivityService;
use App\Services\Web\AdminService;
use App\Services\Web\PublicationService;
use Illuminate\View\View;

class PageController extends Controller
{

    public function __construct(
        protected HomeSliderService $homeSliderService,
        protected ActivityService $activityService,
        protected AdminService $adminService,
        protected PublicationService $publicationService
    ) {}

    public function home(): View
    {
        $data = [
            'sliders' => $this->homeSliderService->getHomeSliders([
                'deviceType' => 0,
            ]),
            'activities' => $this->activityService->getActivities(),
            'admins' => $this->adminService->getAdmins([], ['id', 'profile_image', 'name', 'email']),
            'publications' => $this->publicationService->getPublications()
        ];

        return view('web.index', compact('data'));
    }

    public function aboutUs(): View
    {
        $data = [];

        return view('web.pages.about', compact('data'));
    }

    public function contact(): View
    {
        $data = [];

        return view('web.pages.contact', compact('data'));
    }

    public function serviceDetail(): View
    {
        $data = [];

        return view('web.pages.services-details', compact('data'));
    }
}
