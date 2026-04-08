<?php

namespace App\Services\Admin;

use App\Models\Admin\LayoutConfig;
use App\Repositories\Admin\Iterfaces\LayoutConfigRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

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

        $value = $request->value;

        if ($request->type === 'IMAGE' && $request->hasFile('value') && $request->file('value')->isValid()) {
            $value = $request->file('value')->store('assets/images/layout-config', 'public');
        }

        $data = [
            'key' => $request->key,
            'type' => $request->type,
            'value' => $value ?? null,
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

        $value = $request->value;

        if ($request->type === 'IMAGE' && $request->hasFile('value') && $request->file('value')->isValid()) {
            $config = $this->layoutConfigRepo->find($configId);

            if (isset($config->value)) {

                if ($config->type  == 'IMAGE' && Storage::disk('public')->exists($config->value)) {
                    Storage::disk('public')->delete($config->value);
                }

                $value = $request->file('value')->store('assets/images/layout-config', 'public');
            }
        }

        $data = [
            'key' => $request->key,
            'type' => $request->type,
            'value' => $value ?? null,
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
        $config = $this->layoutConfigRepo->find($id);

        if (isset($config->value)) {
            if ($config->type  == 'IMAGE' && Storage::disk('public')->exists($config->value)) {
                Storage::disk('public')->delete($config->value);
            }
        }

        return $this->layoutConfigRepo->delete($id);
    }
}
