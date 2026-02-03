<?php

namespace App\Services\Admin;

use App\Models\Admin\JobApplication;
use App\Repositories\Admin\Interfaces\JobApplicationRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

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
    |   Fetch a single Job Application record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobApplication
    {
        return $this->jobApplicationRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch Job Application with optional filters and selected columns.
    ==============================================================================*/
    public function getJobApplications(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->jobApplicationRepo->getJobApplications($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing job applicatoin record .
    ==============================================================================*/
    public function update($request): bool
    {
        $data = [
            'status' => $request->status ?? null,
            'response_message' => $request->response_message ?? null,
            'updated_at' => Carbon::now(),
            'updated_by' => 'Admin',
        ];

        return $this->jobApplicationRepo->updateColumns($request->id, $data);
    }

    /* ============================================================================
    | Permanently delete an job application record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $application = $this->jobApplicationRepo->find($id, ['cv_path', 'documents_pdf_path']);

        if (! empty($application->cv_path) && Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        if (! empty($application->documents_pdf_path) && Storage::disk('public')->exists($application->documents_pdf_path)) {
            Storage::disk('public')->delete($application->documents_pdf_path);
        }

        return $this->jobApplicationRepo->delete($id);
    }
}
