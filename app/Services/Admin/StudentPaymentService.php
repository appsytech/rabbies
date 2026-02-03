<?php

namespace App\Services\Admin;

use App\Models\Admin\StudentPayment;
use App\Repositories\Admin\Interfaces\LogMoneyRepositoryInterface;
use App\Repositories\Admin\Interfaces\StudentInfoRepositoryInterface;
use App\Repositories\Admin\Interfaces\StudentPaymentRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class StudentPaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected StudentPaymentRepositoryInterface $studentPaymentRepo,
        protected StudentInfoRepositoryInterface $studentInfoRepo,
        protected LogMoneyRepositoryInterface $logMoneyRepo
    ) {}

    /* =============================================================
    | Create a new student payment record.
    ================================================================*/
    public function create($request): ?StudentPayment
    {
        $studentId = (int) $request->student_id;
        $studentName = $this->studentInfoRepo->find($studentId, ['full_name'])?->full_name;

        $totalFee = (float) $request->total_fee ?? 0;
        $paidAmount = (float) $request->paid_amount ?? 0;
        $remaningAmount = $totalFee - $paidAmount;

        if ($totalFee == $paidAmount) {
            $status = 'PAID';
        } elseif ($paidAmount <= 0) {
            $status = 'PENDING';
        } else {
            $status = 'PARTIAL';
        }

        $data = [
            'student_id' => $studentId,
            'student_name' => $studentName,
            'fee_type' => $request->fee_type,
            'fee_period' => $request->fee_period ?? null,
            'pay_type_name' => $request->pay_type_name,
            'total_fee' => $totalFee,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remaningAmount,
            'payment_status' => $status,
            'payment_date' => $request->payment_date,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->name,
        ];

        $createdStudentPayment = $this->studentPaymentRepo->create($data);

        if ($createdStudentPayment) {
            $this->logMoneyRepo->create([
                'type' => 'INCOME',
                'method_type' => 'STUDENT-FEE',
                'amount' => $paidAmount,
                'payment_method' => 'CASH',
                'user_id' => $createdStudentPayment->student_id,
                'description' => "{$studentName} Paid {$paidAmount}",
                'transaction_date' => $request->payment_date ?? Carbon::now(),
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now(),
            ]);
        }

        return $createdStudentPayment;
    }

    /* ============================================================================
    |   Fetch a single student payment record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?studentPayment
    {
        return $this->studentPaymentRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |   Fetch  latest student payment record by student ID.
    ==============================================================================*/
    public function findLatestByStudentId(int $studentId, ?array $selectedColumns = null): ?StudentPayment
    {
        return $this->studentPaymentRepo->findLatestByStudentId($studentId, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch student payment with optional filters and selected columns.
    ==============================================================================*/
    public function getstudentPayments(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->studentPaymentRepo->getstudentPayments($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing student payment record .
    ==============================================================================*/
    public function update($request): bool
    {
        $studentPaymentId = $request->id;

        $studentId = (int) $request->student_id;
        $studentName = $this->studentInfoRepo->find($studentId, ['full_name'])?->full_name;

        $totalFee = (float) $request->total_fee ?? 0;
        $paidAmount = (float) $request->paid_amount ?? 0;
        $remaningAmount = $totalFee - $paidAmount;

        if ($totalFee == $paidAmount) {
            $status = 'PAID';
        } elseif ($paidAmount <= 0) {
            $status = 'PENDING';
        } else {
            $status = 'PARTIAL';
        }

        $data = [
            'student_id' => $studentId,
            'student_name' => $studentName,
            'fee_type' => $request->fee_type,
            'fee_period' => $request->fee_period ?? null,
            'pay_type_name' => $request->pay_type_name,
            'total_fee' => $totalFee,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remaningAmount,
            'payment_status' => $status,
            'payment_date' => $request->payment_date,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->name,
        ];

        return $this->studentPaymentRepo->updateColumns($studentPaymentId, $data);
    }

    /* ============================================================================
    | Permanently delete an student payment.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->studentPaymentRepo->delete($id);
    }
}
