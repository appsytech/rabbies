<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ActivityService;
use App\Services\Web\ArticleService;
use App\Services\Web\GalleryService;
use App\Services\Web\HomeSliderService;
use App\Services\Web\JobVacancyConfigService;
use App\Services\Web\NoticeService;
use App\Services\Web\PublicationService;
use App\Services\Web\ReportService as WebReportService;
use App\Services\Web\SchoolAnnouncementService;
use App\Services\Web\SchoolStaffService;
use App\Services\Web\StaffHomepageMessageService;
use App\Services\Web\TeacherService;
use Carbon\Carbon;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        protected ActivityService $activityService,
        protected TeacherService $teacherService,
        protected SchoolStaffService $staffService,
        protected NoticeService $noticeService,
        protected ArticleService $articleService,
        protected GalleryService $galleryService,
        protected JobVacancyConfigService $jobVacancyService,
        protected StaffHomepageMessageService $staffHomePageMessageService,
        protected SchoolAnnouncementService $schoolAnnouncementService,
        protected HomeSliderService $homeSliderService,
        protected PublicationService $publicationService,
        protected WebReportService $reportService
    ) {}

    public function home(): View
    {
        $data = [
            'teachers' => $this->teacherService->getTeachers([], ['profile_image', 'name', 'position', 'major_subject', 'fb_profile', 'insta_profile']),
            'notices' => $this->noticeService->getNotices([], ['id', 'title', 'created_at']),
            'staffMessages' => $this->staffHomePageMessageService->getStaffMessages([], ['msg_id', 'title', 'content', 'name', 'position', 'profile_images']),
            'upcomingActivities' => $this->activityService->getActivitiesByType('upcoming', [
                'limit' => 4,
            ]),
            'ourActivities' => $this->activityService->getActivitiesByType('current', [
                'limit' => 4,
            ]),
            'schoolAnnouncements' => $this->schoolAnnouncementService->getSchoolAnnouncements([
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
            ], ['image']),
            'sliders' => $this->homeSliderService->getHomeSliders([
                'deviceType' => 0,
            ]),
            'totalSudents' => $this->reportService->findByType('STUDENT', ['total'])?->total,
            'totalStaffs' => $this->reportService->findByType('TEACHER', ['total'])?->total,
            'totalAwards' => $this->reportService->findByType('AWARD', ['total'])?->total,
        ];

        return view('web.homepage', compact('data'));
    }

    public function aboutUs(): View
    {
        return view('web.pages.about.about-us');
    }

    public function organizationStructure(): View
    {
        return view('web.pages.about.organization-structure');
    }

    public function team(): View
    {
        $data = [
            'teachers' => $this->teacherService->getTeachers([
            ], ['profile_image', 'name', 'position', 'major_subject', 'fb_profile', 'insta_profile']),
            'nonTeachingStaff' => $this->staffService->getStaffs([
                'type' => 'NOT-TEACHING-STAFF',
            ], ['profile_image', 'full_name', 'position', 'type', 'fb_profile', 'instagram_profile']),

            'administrativeStaff' => $this->staffService->getStaffs([
                'type' => 'SCHOOL-MANAGEMENT-COMMITTEE',
            ], ['profile_image', 'full_name', 'position', 'type', 'fb_profile', 'instagram_profile']),
        ];

        return view('web.pages.about.team', compact('data'));
    }

    public function assemblyMember(): View
    {
        $data = [
            'assemblyMembers' => $this->staffService->getStaffs([
                'type' => 'ASSEMBLY-MEMBERS',
            ], ['profile_image', 'full_name', 'position', 'type', 'fb_profile', 'instagram_profile']),
        ];

        return view('web.pages.about.assembly-member', compact('data'));
    }

    // public function activity(): View
    // {
    //     $data = [
    //         'upcomingActivities' => $this->activityService->getActivitiesByType('upcoming', [
    //             'limit' => 4,
    //         ]),
    //         'ourActivities' => $this->activityService->getActivitiesByType('current', [
    //             'limit' => 4,
    //         ]),
    //     ];

    //     return view('web.pages.activity.activity', compact('data'));
    // }

    public function ourActivity(): View
    {
        $data = [
            'activities' => $this->activityService->getActivitiesByType(),
        ];

        return view('web.pages.activity.our-activity', compact('data'));
    }

    public function upcomingActivity(): View
    {
        $data = [
            'upcomingActivities' => $this->activityService->getActivitiesByType('upcoming'),
        ];

        return view('web.pages.activity.upcoming-activity', compact('data'));
    }

    public function publication(): View
    {
        $data = [
            'publications' => $this->publicationService->getPublications(),
        ];

        return view('web.pages.publication.index', compact('data'));
    }

    public function teacherArticle(): View
    {
        $data = [
            'articles' => $this->articleService->getArticles([
                'articlesAuthorType' => 2,
            ]),
        ];

        return view('web.pages.article.teacher-article', compact('data'));
    }

    public function studentArticle(): View
    {
        $data = [
            'articles' => $this->articleService->getArticles([
                'articlesAuthorType' => 3,
            ]),
        ];

        return view('web.pages.article.student-article', compact('data'));
    }

    public function schoolArticle(): View
    {
        $data = [
            'articles' => $this->articleService->getArticles([
                'articlesAuthorType' => 1,
            ]),
        ];

        return view('web.pages.article.school-article', compact('data'));
    }

    public function managementArticle(): View
    {
        $data = [
            'articles' => $this->articleService->getArticles([
                'articlesAuthorType' => 4,
            ]),
        ];

        return view('web.pages.article.management-article', compact('data'));
    }

    public function galleryImage(): View
    {
        $data = [
            'images' => $this->galleryService->getGalleryImages([
                'type' => 'images',
            ], ['title', 'description', 'type', 'image_path']),
        ];

        return view('web.pages.gallery.image', compact('data'));
    }

    public function galleryVideo(): View
    {
        $data = [
            'images' => $this->galleryService->getGalleryImages([
                'type' => 'video',
            ], ['title', 'description', 'type', 'image_path']),
        ];

        return view('web.pages.gallery.video', compact('data'));
    }

    public function admission(): View
    {
        return view('web.pages.admission');
    }

    public function vacancy(): View
    {
        $data = [
            'vacancies' => $this->jobVacancyService->getVacancies([
                'limit' => 10,
            ], ['id', 'position', 'vacancy_type', 'school_location', 'grade_level', 'required_experience', 'description', 'created_at']),
        ];

        return view('web.pages.vacancy.index', compact('data'));
    }

    public function contact(): View
    {
        return view('web.pages.contact');
    }
}
