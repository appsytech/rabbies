<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\StudentPayment;
use Illuminate\Database\Eloquent\Collection;

interface StudentPaymentRepositoryInterface
{
    /* ============================================================================
    | Create a new student payment record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?StudentPayment;

    /* ============================================================================
    |   Fetch a single student payment record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StudentPayment;

    /* ============================================================================
    |   Fetch a latest student payment record by student ID.
    ==============================================================================*/
    public function findLatestByStudentId(int $studentId, ?array $selectedColumns = null): ?StudentPayment;

    /* ============================================================================
    |  Fetch student payment with optional filters and selected columns.
    ==============================================================================*/
    public function getStudentPayments(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing student payment record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing student payment record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
