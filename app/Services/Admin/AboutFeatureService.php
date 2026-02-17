<?php

namespace App\Services\Admin;

use App\Models\Admin\AboutFeature;
use App\Repositories\Admin\Interfaces\AboutFeatureRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class AboutFeatureService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AboutFeatureRepositoryInterface $aboutFeatureRepo
    ) {
        //
    }





    /* =============================================================
    | Create a new about feature record.
    ================================================================*/
    public function create($request)
    {

        $data = [
            'title'               => $request->title,
            'description'         => $request->description ?? null,
            'status'              => $request->status ?? 'ACTIVE',
            'sort'                => $request->sort,
            'created_at'          => Carbon::now()
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('assets/icons/about-features', 'public');
        }


        $isCreated = $this->aboutFeatureRepo->create($data);

        if ($isCreated) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'messages' => ['About us feature Created Successfully'],
                'errors' => null,
                'data' => null,
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'code' => 500,
                'messages' => ['Something went wrong'],
                'errors' => ['Something went wrong'],
                'data' => null,
            ], 500);
        }
    }

    /* ============================================================================
    |   Fetch a single about feature record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutFeature
    {
        return $this->aboutFeatureRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch about features with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutFeatures(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->aboutFeatureRepo->getAboutFeatures($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing about feature record .
    ==============================================================================*/
    public function update($request): bool
    {
        $featureId = $request->id;
        $aboutFeature = $this->aboutFeatureRepo->find($featureId, ['icon']);

        $data = [
            'title'               => $request->title,
            'description'         => $request->description ?? null,
            'status'              => $request->status ?? 'ACTIVE',
            'sort'                => $request->sort,
            'updated_at'          => Carbon::now()
        ];

        if ($request->hasFile('icon')) {
            if (isset($aboutFeature->icon) && Storage::disk('public')->exists($aboutFeature->icon)) {
                Storage::disk('public')->delete($aboutFeature->icon);
            }
            $data['icon'] = $request->file('icon')->store('assets/icons/about-features', 'public');
        }

        return $this->aboutFeatureRepo->updateColumns($featureId, $data);
    }



    /* ============================================================================
    | Permanently delete an about feature.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $aboutFeature = $this->aboutFeatureRepo->find($id, ['icon']);

        if (! empty($aboutFeature->icon) && Storage::disk('public')->exists($aboutFeature->icon)) {
            Storage::disk('public')->delete($aboutFeature->icon);
        }

        return $this->aboutFeatureRepo->delete($id);
    }
}
