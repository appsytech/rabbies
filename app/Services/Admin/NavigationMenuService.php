<?php

namespace App\Services\Admin;

use App\Models\Admin\NavigationMenu;
use App\Repositories\Admin\Interfaces\NavigationMenuRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class NavigationMenuService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected NavigationMenuRepositoryInterface $navigationMenuRepo
    ) {}


    /* ============================================================================
    |   Fetch a single navigation menu record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?NavigationMenu
    {
        return $this->navigationMenuRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch navigation menus with optional filters and selected columns.
    ==============================================================================*/
    public function getNavigationMenus(?array $filterData = null, ?array $selectedcolumns = null): ?LengthAwarePaginator
    {
        return $this->navigationMenuRepo->getNavigationMenus($filterData, $selectedcolumns);
    }


    /* ============================================================================
    | Update an existing navigation menu record .
    ==============================================================================*/
    public function update($request): array
    {
        $configId = $request->id;

        $data = [
            'title' => $request->title,
            'status' => $request->status ?? null,
            'sort' => $request->sort ?? 0,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->name
        ];

        $isUpdated =  $this->navigationMenuRepo->updateColumns($configId, $data);

        if ($isUpdated) {
            return [
                'status' => true,
                'message' => ['Navigation Menu Updated successfully']
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
        $menu = $this->navigationMenuRepo->find($id, ['id', 'status']);

        if (! $menu) {
            return false;
        }

        return $this->navigationMenuRepo->updateColumns($id, [
            'status' => ! $menu->status,
        ]);
    }
}
