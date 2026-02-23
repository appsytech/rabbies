<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Admin\HomeSliderService;
use App\Services\Web\AboutFeatureService;
use App\Services\Web\AboutUsService;
use App\Services\Web\ActivityService;
use App\Services\Web\AdminService;
use App\Services\Web\GalleryService;
use App\Services\Web\PublicationService;
use App\Services\Web\ServiceService;
use Illuminate\View\View;

class PageController extends Controller
{

    public function __construct(
        protected HomeSliderService $homeSliderService,
        protected ActivityService $activityService,
        protected AdminService $adminService,
        protected PublicationService $publicationService,
        protected ServiceService $serviceService,
        protected AboutUsService $aboutUsService,
        protected AboutFeatureService $aboutFeatureService,
        protected GalleryService $galleryService
    ) {}

    public function home(): View
    {
        $data = [
            'sliders' => $this->homeSliderService->getHomeSliders([
                'deviceType' => 0,
            ]),
            'activities' => $this->activityService->getActivities([
                'paginateLimit' => 4,
                'type' => 'CURRENT'
            ]),
            'admins' => $this->adminService->getAdmins([], ['id', 'profile_image', 'name', 'position']),
            'publications' => $this->publicationService->getPublications([
                'paginateLimit' => 6
            ]),
            'services' => $this->serviceService->getServices(),
            'aboutus' => $this->aboutUsService->findFirstAboutUs(),
            'aboutFeatures' => $this->aboutFeatureService->getAboutFeatures([
                'limit' =>  4
            ]),
            'galleries' => $this->galleryService->getGalleryImages()
        ];

        return view('web.index', compact('data'));
    }

    public function aboutUs(): View
    {
        $data = [
            'aboutus' => $this->aboutUsService->findFirstAboutUs(),
            'aboutFeatures' => $this->aboutFeatureService->getAboutFeatures([
                'limit' =>  4
            ]),
            'members' => $this->adminService->getAdmins([], ['id', 'profile_image', 'name', 'position'])
        ];


        return view('web.pages.about', compact('data'));
    }

    public function contact(): View
    {
        $data = [];

        return view('web.pages.contact', compact('data'));
    }
}
