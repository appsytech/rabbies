<?php

namespace App\Services\Admin;

use App\Models\Admin\SocialMediaConfig;
use App\Repositories\Admin\Interfaces\SocialMediaConfigRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class SocialMediaConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SocialMediaConfigRepositoryInterface $socialMediaConfigRepo
    ) {}


    /* =============================================================
    | Create a new social media config record.
    ================================================================*/
    public function create($request): array
    {
        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'sort' => $request->sort ?? null,
            'status' => $request->status ?? null,
            'type' => $request->type,
            'created_at' => Carbon::now()
        ];


        $createdSocialMediaConfig = $this->socialMediaConfigRepo->create($data);

        if ($createdSocialMediaConfig) {
            return [
                'status' => true,
                'message' => ['Social Media Config Created successfully']
            ];
        }

        return [
            'status' => false,
            'message' => ['Something went wrong']
        ];
    }

    /* ============================================================================
    |   Fetch a single social media config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SocialMediaConfig
    {
        return $this->socialMediaConfigRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch social media configs with optional filters and selected columns.
    ==============================================================================*/
    public function getSocialMediaConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->socialMediaConfigRepo->getSocialMediaConfigs($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing social media config record .
    ==============================================================================*/
    public function update($request): array
    {
        $configId = $request->id;

        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'type' => $request->type,
            'sort' => $request->sort ?? null,
            'status' => $request->status ?? null,
            'updated_at' => Carbon::now()
        ];


        $isUpdated =  $this->socialMediaConfigRepo->updateColumns($configId, $data);

        if ($isUpdated) {
            return [
                'status' => true,
                'message' => ['Social Media Config Updated successfully']
            ];
        }

        return [
            'status' => false,
            'message' => ['Something went wrong']
        ];
    }

    /* ============================================================================
    | Toggle social media config status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $config = $this->socialMediaConfigRepo->find($id, ['id', 'status']);

        if (! $config) {
            return false;
        }

        return $this->socialMediaConfigRepo->updateColumns($id, [
            'status' => ! $config->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an social media config.
    ==============================================================================*/
    public function delete(int $id): bool
    {
         return $this->socialMediaConfigRepo->delete($id);
    }
}
