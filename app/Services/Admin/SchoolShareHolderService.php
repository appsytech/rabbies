<?php

namespace App\Services\Admin;

use App\Models\Admin\SchoolShareHolder;
use App\Repositories\Admin\Interfaces\SchoolShareHolderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SchoolShareHolderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SchoolShareHolderRepositoryInterface $schoolShareHolderRepo
    ) {}

    /* =============================================================
    | Create a new school Shareholder record.
    ================================================================*/
    public function create($request): ?SchoolShareHolder
    {
        $previousInvestment = $this->getPreviousInvestment($request->phone) ?? 0;

        $investedNow = (float) $request->invested_now ?? 0;
        $totalInvestment = $investedNow + $previousInvestment;

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email ?? null,
            'phone' => $request->phone ?? null,
            'address' => $request->address ?? null,
            'invested_now' => $investedNow,
            'previous_investment' => $previousInvestment,
            'total_investment' => $totalInvestment,
            'investment_date' => Carbon::now(),
            'num_investments' => $request->num_investments,
            'payment_type' => $request->payment_type,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->name,
        ];

        if ($request->hasFile('voucher_image')) {
            $data['voucher_image'] = $request->file('voucher_image')->store('assets/images/shareholder/vouchers', 'public');
        }

        return $this->schoolShareHolderRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single school Shareholder record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?schoolShareHolder
    {
        return $this->schoolShareHolderRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch school Shareholders with optional filters and selected columns.
    ==============================================================================*/
    public function getschoolShareHolders(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->schoolShareHolderRepo->getschoolShareHolders($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing school Shareholder record .
    ==============================================================================*/
    public function update($request): bool
    {
        $schoolShareHolderId = $request->id;

        $previousInvestment = $this->getPreviousInvestment($request->phone) ?? 0;
        $shareHolder = $this->schoolShareHolderRepo->find($schoolShareHolderId, ['voucher_image']);

        $investedNow = (float) $request->invested_now ?? 0;
        $totalInvestment = $investedNow + $previousInvestment;
        $paymentType = $request->payment_type;

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email ?? null,
            'phone' => $request->phone ?? null,
            'address' => $request->address ?? null,
            'invested_now' => $investedNow,
            'previous_investment' => $previousInvestment,
            'investment_date' => Carbon::now(),
            'total_investment' => $totalInvestment,
            'num_investments' => $request->num_investments,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->name,
            'payment_type' => $paymentType,
        ];

        if ($paymentType == 'CASH' && isset($shareHolder->voucher_image) && Storage::disk('public')->exists($shareHolder->voucher_image)) {
            Storage::disk('public')->delete($shareHolder->voucher_image);
            $data['voucher_image'] = null;
        }

        if ($request->hasFile('voucher_image')) {
            if (isset($shareHolder->voucher_image) && Storage::disk('public')->exists($shareHolder->voucher_image)) {
                Storage::disk('public')->delete($shareHolder->voucher_image);
            }
            $data['voucher_image'] = $request->file('voucher_image')->store('assets/images/shareholder/vouchers', 'public');
        }

        return $this->schoolShareHolderRepo->updateColumns($schoolShareHolderId, $data);
    }

    /* ============================================================================
    | Permanently delete an school Shareholder.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $shareHolder = $this->schoolShareHolderRepo->find($id, ['voucher_image']);

        if (isset($shareHolder->voucher_image) && Storage::disk('public')->exists($shareHolder->voucher_image)) {
            Storage::disk('public')->delete($shareHolder->voucher_image);
        }

        return $this->schoolShareHolderRepo->delete($id);
    }

    /* ====================================================================
    |Get total investment of a shareholder by phone number.
    =======================================================================*/
    public function getPreviousInvestment(string $phone)
    {
        $totalInvestment = $this->schoolShareHolderRepo->getTotalInvestmentByPhone($phone);

        if ($totalInvestment) {
            return $totalInvestment;
        }

        return $this->schoolShareHolderRepo->getInvestmentSumByPhone($phone);
    }
}
