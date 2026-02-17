<?php

namespace App\Services\Admin;

use App\Models\Admin\AboutUs;
use App\Repositories\Admin\Interfaces\AboutUsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class AboutUsService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AboutUsRepositoryInterface $aboutUsRepo
    ) {
        //
    }



    /* ============================================================================
    |   Fetch a single about us record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?AboutUs
    {
        return $this->aboutUsRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch about us  with optional filters and selected columns.
    ==============================================================================*/
    public function getAboutUs(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->aboutUsRepo->getAboutUs($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing about us record .
    ==============================================================================*/
    public function update($request): bool
    {
        $aboutId = $request->id;
        $aboutUs = $this->aboutUsRepo->find($aboutId, ['images1', 'images2']);

        $data = [
            'title'               => $request->title,
            'author'              => $request->author,
            'description'         => $request->description,
        ];


        if ($request->hasFile('images1')) {
            if (isset($aboutUs->images1) && Storage::disk('public')->exists($aboutUs->images1)) {
                Storage::disk('public')->delete($aboutUs->images1);
            }
            $data['images1'] = $request->file('images1')->store('assets/images/aboutus', 'public');
        }

        if ($request->hasFile('images2')) {
            if (isset($aboutUs->images2) && Storage::disk('public')->exists($aboutUs->images2)) {
                Storage::disk('public')->delete($aboutUs->images2);
            }
            $data['images2'] = $request->file('images2')->store('assets/images/aboutus', 'public');
        }


        return $this->aboutUsRepo->updateColumns($aboutId, $data);
    }
}
