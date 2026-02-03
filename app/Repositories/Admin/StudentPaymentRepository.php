<?php

namespace App\Repositories\Admin;

use App\Models\Admin\StudentPayment;
use App\Repositories\Admin\Interfaces\StudentPaymentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StudentPaymentRepository implements StudentPaymentRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    | Create a new student payment record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?StudentPayment
    {
        return StudentPayment::create($data);
    }

    /* ============================================================================
    |   Fetch a single student payment record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StudentPayment
    {
        return StudentPayment::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |   Fetch a latest student payment record by student ID.
    ==============================================================================*/
    public function findLatestByStudentId(int $studentId, ?array $selectedColumns = null): ?StudentPayment
    {
        return StudentPayment::where('student_id', $studentId)
            ->orderByDesc('created_at')
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch student payment with optional filters and selected columns.
    ==============================================================================*/
    public function getStudentPayments(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return StudentPayment::when(
            isset($filterData['studentId']),
            function ($query) use ($filterData) {
                $query->where('student_id', $filterData['studentId']);
            }
        )
            ->when(
                isset($filterData['feeType']),
                function ($query) use ($filterData) {
                    $query->where('fee_type', $filterData['feeType']);
                }
            )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('payment_status', $filterData['status']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->orderByDesc('created_at')
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing student payment record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return StudentPayment::where('id', $id)->update($data);

    }

    /* ================================================
     |Delete existing student payment record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return StudentPayment::where('id', $id)->delete();

    }
}
