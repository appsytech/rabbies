<?php

namespace App\Services\Admin;

use App\Models\Admin\TeacherSalary;
use App\Repositories\Admin\Interfaces\LogMoneyRepositoryInterface;
use App\Repositories\Admin\Interfaces\TeacherRepositoryInterface;
use App\Repositories\Admin\Interfaces\TeacherSalaryRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TeacherSalaryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected TeacherSalaryRepositoryInterface $teacherSalaryRepo,
        protected TeacherRepositoryInterface $teacherRepo,
        protected LogMoneyRepositoryInterface $logMoneyRepo
    ) {
        //
    }

    /* =============================================================
     | Create a new Teacher salary record.
    ================================================================*/
    public function create($request): ?TeacherSalary
    {
        $teacherId = (int) $request->teacher_id;
        $teacherName = $this->teacherRepo->find($teacherId, ['name'])->name;

        $previousRemaining = $this->findLatestByTeacherId($teacherId, ['remaining_amount'])?->remaining_amount ?? 0;

        $baseSalary = (float) $request->base_salary ?? 0;
        $bonus = (float) $request->bonuses ?? 0;
        $taxPercentage = (float) $request->tax_percentage ?? 0;
        $paidAmount = (float) $request->paid_amount ?? 0;
        $advanceAmount = (float) $request->advances ?? 0;

        $taxableAmount = $baseSalary + $bonus;
        $taxAmount = ($taxableAmount * $taxPercentage) / 100;
        $totalAmount = $taxableAmount - $taxAmount - $advanceAmount;
        $remainingAmount = $previousRemaining + $totalAmount - $paidAmount;

        $status = match (true) {
            $paidAmount <= 0 && $advanceAmount <= 0 => 'UNPAID',
            $remainingAmount <= 0 => 'PAID',
            ($paidAmount > 0 && $remainingAmount > 0) || $advanceAmount > 0 => 'PARTIALLY PAID',
        };

        $data = [
            'teacher_id' => $teacherId,
            'teacher_name' => $teacherName,
            'academic_year' => $request->academic_year,
            'month' => $request->month,
            'base_salary' => $baseSalary,
            'bonuses' => $bonus ?? null,
            'tax_percentage' => $taxPercentage ?? null,
            'tax_amount' => $taxAmount ?? null,
            'advances' => $advanceAmount ?? null,
            'total_salary' => $totalAmount ?? null,
            'paid_amount' => $paidAmount ?? null,
            'remaining_amount' => $remainingAmount,
            'status' => $status,
            'payment_date' => $request->payment_date,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now(),
        ];

        $createdSalary = $this->teacherSalaryRepo->create($data);

        if ($createdSalary) {
            $this->logMoneyRepo->create([
                'type' => 'EXPENSE',
                'method_type' => 'TEACHER-SALARY',
                'amount' => $paidAmount,
                'payment_method' => 'CASH',
                'user_id' => $teacherId,
                'description' => "Paid amount {$paidAmount} to {$teacherName}",
                'transaction_date' => $request->payment_date ?? Carbon::now(),
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now(),
            ]);
        }

        return $createdSalary;
    }

    /* ============================================================================
    |   Fetch a single Teacher salary record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?TeacherSalary
    {
        return $this->teacherSalaryRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |   Fetch a latest teacher payment record by teacher ID.
    ==============================================================================*/
    public function findLatestByTeacherId(int $teacherId, ?array $selectedColumns = null): ?TeacherSalary
    {
        return $this->teacherSalaryRepo->findLatestByTeacherId($teacherId, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch Teacher salaries with optional filters and selected columns.
    ==============================================================================*/
    public function getTeacherSalaries(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->teacherSalaryRepo->getTeacherSalaries($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing Teacher salary record .
    ==============================================================================*/
    public function update($request): bool
    {
        $salaryId = $request->id;

        $teacherId = (int) $request->teacher_id;
        $teacherName = $this->teacherRepo->find($teacherId, ['name'])->name;


        $baseSalary = (float) $request->base_salary ?? 0;
        $bonus = (float) $request->bonuses ?? 0;
        $taxPercentage = (float) $request->tax_percentage ?? 0;
        $paidAmount = (float) $request->paid_amount ?? 0;
        $advanceAmount = (float) $request->advances ?? 0;

        $taxableAmount = $baseSalary + $bonus;
        $taxAmount = ($taxableAmount * $taxPercentage) / 100;
        $totalAmount = $taxableAmount - $taxAmount - $advanceAmount;
        $remainingAmount = $request->remaining_amount;

      
        $status = match (true) {
            $paidAmount <= 0 && $advanceAmount <= 0 => 'UNPAID',
            $remainingAmount <= 0 => 'PAID',
            ($paidAmount > 0 && $remainingAmount > 0) || $advanceAmount > 0 => 'PARTIALLY PAID',
        };

        $data = [
            'teacher_id' => $teacherId,
            'teacher_name' => $teacherName,
            'academic_year' => $request->academic_year,
            'month' => $request->month,
            'base_salary' => $baseSalary,
            'bonuses' => $bonus ?? null,
            'tax_percentage' => $taxPercentage ?? null,
            'tax_amount' => $taxAmount ?? null,
            'advances' => $advanceAmount ?? null,
            'total_salary' => $totalAmount ?? null,
            'paid_amount' => $paidAmount ?? null,
            'remaining_amount' => $remainingAmount,
            'status' => $status,
            'payment_date' => $request->payment_date,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now(),
        ];

        return $this->teacherSalaryRepo->updateColumns($salaryId, $data);
    }

    /* ============================================================================
    | Permanently delete an Teacher salary record.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        return $this->teacherSalaryRepo->delete($id);
    }
}
