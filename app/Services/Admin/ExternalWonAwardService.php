<?php

namespace App\Services\Admin;

use App\Models\Admin\ExternalWonAward;
use App\Repositories\Admin\Interfaces\ExternalWonAwardRepositoryInterface;
use App\Repositories\Admin\Interfaces\ReportRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ExternalWonAwardService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ExternalWonAwardRepositoryInterface $externalWonAwardRepo,
        protected ReportRepositoryInterface $reportRepo
    ) {}

    /* =============================================================
    | Create a new external won award record.
    ================================================================*/
    public function create($request): ?ExternalWonAward
    {
        $data = [
            'award_name' => $request->award_name,
            'award_type' => $request->award_type,
            'award_to' => $request->award_to,
            'award_by' => $request->award_by,
            'award_year' => $request->award_year ?? null,
            'award_by_country' => $request->award_by_country,
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/images/external-awards', 'public');
        }

        $createdAward = $this->externalWonAwardRepo->create($data);

        if ($createdAward) {
            $this->reportRepo->incrementTotalForType('AWARD');

        }

        return $createdAward;
    }

    /* ============================================================================
    |   Fetch a single external won award record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ExternalWonAward
    {
        return $this->externalWonAwardRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch external won awards with optional filters and selected columns.
    ==============================================================================*/
    public function getExternalWonAwards(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->externalWonAwardRepo->getExternalWonAwards($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing external won award record .
    ==============================================================================*/
    public function update($request): bool
    {
        $externalWonAwardId = $request->id;
        $externalWonAward = $this->externalWonAwardRepo->find($externalWonAwardId, ['image']);

        $data = [
            'award_name' => $request->award_name,
            'award_type' => $request->award_type,
            'award_to' => $request->award_to,
            'award_by' => $request->award_by,
            'award_year' => $request->award_year ?? null,
            'award_by_country' => $request->award_by_country,
        ];

        if ($request->hasFile('image')) {
            if (isset($externalWonAward->image) && Storage::disk('public')->exists($externalWonAward->image)) {
                Storage::disk('public')->delete($externalWonAward->image);
            }
            $data['image'] = $request->file('image')->store('assets/images/external-awards', 'public');
        }

        return $this->externalWonAwardRepo->updateColumns($externalWonAwardId, $data);
    }

    /* ============================================================================
    | Permanently delete an external won award.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $externalWonAward = $this->externalWonAwardRepo->find($id, ['image']);

        if (! empty($externalWonAward->image) && Storage::disk('public')->exists($externalWonAward->image)) {
            Storage::disk('public')->delete($externalWonAward->image);
        }

        $isDeleted = $this->externalWonAwardRepo->delete($id);

        if ($isDeleted) {
            $this->reportRepo->decrementTotalForType('AWARD');
        }

        return $isDeleted;
    }
}
