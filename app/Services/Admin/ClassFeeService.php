<?php

namespace App\Services\Admin;

use App\Models\Admin\ClassFee;
use App\Repositories\Admin\Interfaces\ClassFeeRepositoryInterface;
use App\Repositories\Admin\Interfaces\ClassInfoRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ClassFeeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ClassFeeRepositoryInterface $classFeeRepo,
        protected ClassInfoRepositoryInterface $classInfoRepo
    ) {}

    /* =============================================================
     | Create a new classes fee record.
    ================================================================*/
    public function create($request): ?ClassFee
    {
        $classId = (int) $request->class_id;
        $className = $this->classInfoRepo->find($classId, ['grade'])->grade;

        $data = [
            'class_id' => $classId,
            'class_name' => $className,
            'base_fee' => $request->base_fee,
            'discount_percentage' => $request->discount_percentage,
            'academic_year' => $request->academic_year,
            'status' => $request->status,
            'remarks' => $request->remarks ?? null,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now(),

        ];

        return $this->classFeeRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single classes fee record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?ClassFee
    {
        return $this->classFeeRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch classes fee with optional filters and selected columns.
    ==============================================================================*/
    public function getClassesFee(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->classFeeRepo->getClassesFee($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing classes fee record .
    ==============================================================================*/
    public function update($request): bool
    {
        $feeId = $request->id;

        $data = [
            'base_fee' => $request->base_fee,
            'discount_percentage' => $request->discount_percentage,
            'academic_year' => $request->academic_year,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now(),
        ];

        return $this->classFeeRepo->updateColumns($feeId, $data);
    }

    /* ============================================================================
    | Toggle classes fee status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $fee = $this->classFeeRepo->find($id, ['id', 'status']);

        if (! $fee) {
            return false;
        }

        return $this->classFeeRepo->updateColumns($id, [
            'status' => ! $fee->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an classes fee record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->classFeeRepo->delete($id);
    }
}
