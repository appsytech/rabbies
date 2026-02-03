<?php

namespace App\Services\Web;

use App\Models\Admin\JobApplication;
use App\Repositories\Web\Interface\JobApplicationRepositoryInterface;
use Carbon\Carbon;

class JobApplicationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected JobApplicationRepositoryInterface $jobApplicationRepo
    ) {
        //
    }

    /* ============================================================================
     | Create a new job application record in the database and returns the created record.
     ==============================================================================*/
    public function create($request): ?JobApplication
    {
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth ?? null,
            'higher_degree' => $request->higher_degree ?? null,
            'major_of_study' => $request->major_of_study ?? null,
            'experience' => $request->experience ?? null,
            'current_school' => $request->current_school ?? null,
            'teaching_subject' => $request->teaching_subject ?? null,
            'applied_position' => $request->applied_position ?? null,
            'available_join_date' => $request->available_join_date,
            'status' => 'PENDING',
            'message_from_employee' => $request->message_from_employee,
            'created_by' => 'user',
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('cv')) {
            $data['cv_path'] = $request->file('cv')->store('assets/pdfs/job-applications', 'public');
        }

        if ($request->hasFile('documents_pdf')) {
            $data['documents_pdf_path'] = $request->file('documents_pdf')->store('assets/pdfs/job-applications', 'public');
        }

        return $this->jobApplicationRepo->create($data);
    }
}
