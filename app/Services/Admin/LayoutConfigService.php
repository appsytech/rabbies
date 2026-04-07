<?php

namespace App\Services\Admin;

use App\Models\Admin\LayoutConfig;
use App\Repositories\Admin\Iterfaces\LayoutConfigRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class LayoutConfigService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected LayoutConfigRepositoryInterface $layoutConfigRepo
    ) {}


    /* =============================================================
    | Create a new layout config record.
    ================================================================*/
    public function create($request): array
    {
        $data = [
            'key' => $request->key,
            'type' => $request->type,
            'value' => $request->value ?? null,
            'status' => $request->status ?? null,
            'created_at' => Carbon::now()
        ];


        $createdLayoutConfig = $this->layoutConfigRepo->create($data);

        if ($createdLayoutConfig) {
            return [
                'status' => true,
                'message' => ['Layout Config Created successfully']
            ];
        }

        return [
            'status' => false,
            'message' => ['Something went wrong']
        ];
    }



    /* ============================================================================
    |   Fetch a single layout config record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?LayoutConfig
    {
        return $this->layoutConfigRepo->find($id, $selectedColumns);
    }


    /* ============================================================================
    |  Fetch Layout configs with optional filters and selected columns.
    ==============================================================================*/
    public function getLayoutConfigs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->layoutConfigRepo->getLayoutConfigs($filterData, $selectedcolumns);
    }



    /* ============================================================================
    | Update an existing  layout config record .
    ==============================================================================*/
    public function update($request): array
    {
        $configId = $request->id;

        $data = [
            'key' => $request->key,
            'type' => $request->type,
            'value' => $request->value ?? null,
            'status' => $request->status ?? null,
            'updated_at' => Carbon::now()
        ];

        $isUpdated =  $this->layoutConfigRepo->updateColumns($configId, $data);

        if ($isUpdated) {
            return [
                'status' => true,
                'message' => ['Layout Config Updated successfully']
            ];
        }

        return [
            'status' => false,
            'message' => ['Something went wrong']
        ];
    }


    /* ============================================================================
    | Toggle Layout config status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $config = $this->layoutConfigRepo->find($id, ['id', 'status']);

        if (! $config) {
            return false;
        }

        return $this->layoutConfigRepo->updateColumns($id, [
            'status' => ! $config->status,
        ]);
    }


    /* ============================================================================
    | Permanently delete an  Layout config.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->layoutConfigRepo->delete($id);
    }
}
