<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\JobApplicationService;
use App\Services\Web\JobVacancyConfigService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    public function __construct(
        protected JobApplicationService $jobApplicationService,
        protected JobVacancyConfigService $jobVacancyConfigService
    ) {}

    public function apply(Request $request): View
    {
        $vacancyId = decrypt($request->id);

        $data = [
            'appliedPosition' => $this->jobVacancyConfigService->find($vacancyId, ['position'])?->position,
        ];

        return view('web.pages.vacancy.apply', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:job_applications,email',
            'phone' => 'required|string|max:15|unique:job_applications,phone',
            'gender' => 'required|in:MALE,FEMALE,OTHER',
            'date_of_birth' => 'nullable|date',
            'higher_degree' => 'nullable|string|max:255',
            'major_of_study' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'current_school' => 'nullable|string|max:255',
            'teaching_subject' => 'nullable|string|max:255',
            'applied_position' => 'nullable|string|max:255',
            'available_join_date' => 'required|date',
            'message_from_employee' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'documents_pdf' => 'nullable|file|mimes:pdf|max:4096',
            'terms_accepted' => 'accepted',
        ]);

        $isCreated = $this->jobApplicationService->create($request);

        if ($isCreated) {
            return redirect()->route('vacancy')->with('success', 'Thank you for applying. we will get to you soon.');
        } else {
            return redirect()->back()->withErrors('Something went wrong!. Try again')->withInput();
        }
    }
}
