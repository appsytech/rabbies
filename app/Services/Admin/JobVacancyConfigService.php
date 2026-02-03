<?php

namespace App\Services\Admin;

use App\Models\Admin\JobVacancyConfig;
use App\Repositories\Admin\Interfaces\JobVacancyConfigRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class JobVacancyConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected JobVacancyConfigRepositoryInterface $jobVacancyConfigRepo
    ) {}

    /* =============================================================
     | Create a new job vacancy record.
    ================================================================*/
    public function create($request): ?JobVacancyConfig
    {
        $data = [
            'position' => $request->position,
            'vacancy_type' => $request->vacancy_type,
            'school_location' => $request->school_location ?? null,
            'grade_level' => $request->grade_level ?? null,
            'required_experience' => $request->required_experience,
            'sort' => $request->sort,
            'status' => $request->status,
            'description' => $request->description ?? null,
            'created_at' => Carbon::now(),
        ];

        return $this->jobVacancyConfigRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single job vacancy record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?JobVacancyConfig
    {
        return $this->jobVacancyConfigRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch job vacancy with optional filters and selected columns.
    ==============================================================================*/
    public function getVacancies(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->jobVacancyConfigRepo->getVacancies($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing job vacancy record .
    ==============================================================================*/
    public function update($request): bool
    {
        $vacancyId = $request->id;

        $data = [
            'position' => $request->position,
            'vacancy_type' => $request->vacancy_type,
            'school_location' => $request->school_location ?? null,
            'grade_level' => $request->grade_level ?? null,
            'required_experience' => $request->required_experience,
            'sort' => $request->sort,
            'status' => $request->status,
            'description' => $request->description ?? null,
        ];

        return $this->jobVacancyConfigRepo->updateColumns($vacancyId, $data);

    }

    /* ============================================================================
    | Permanently delete an job vacancy along with its stored image.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->jobVacancyConfigRepo->delete($id);
    }
}
