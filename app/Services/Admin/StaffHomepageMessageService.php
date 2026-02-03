<?php

namespace App\services\Admin;

use App\Models\Admin\StaffHomepageMessage;
use App\Repositories\Admin\Interfaces\StaffHomepageMessageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class StaffHomepageMessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected StaffHomepageMessageRepositoryInterface $staffHomepageMessageRepo
    ) {}

    /* ========================================================================================
    | Create a new staff homepage message record in the database and returns the created record.
    ===========================================================================================*/
    public function create($request): ?StaffHomepageMessage
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'name' => $request->name,
            'position' => $request->position,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('profile_images')) {
            $data['profile_images'] = $request->file('profile_images')->store('assets/images/staff-homepage-message', 'public');
        }

        return $this->staffHomepageMessageRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a staff homepage message record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?StaffHomepageMessage
    {
        return $this->staffHomepageMessageRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch staff homepage messages with optional filters and selected columns.
    ==============================================================================*/
    public function getStaffMessages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->staffHomepageMessageRepo->getStaffMessages($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing staff homepage message record .
    ==============================================================================*/
    public function update($request): bool
    {
        $messageId = $request->id;
        $staffMessage = $this->staffHomepageMessageRepo->find($messageId, ['profile_images']);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'name' => $request->name,
            'position' => $request->position,
            'status' => $request->status,
        ];

        if ($request->hasFile('profile_images')) {
            if (isset($staffMessage->profile_images) && Storage::disk('public')->exists($staffMessage->profile_images)) {
                Storage::disk('public')->delete($staffMessage->profile_images);
            }

            $data['profile_images'] = $request->file('profile_images')->store('assets/images/staff-homepage-message', 'public');
        }

        return $this->staffHomepageMessageRepo->updateColumns($messageId, $data);
    }

    /* ============================================================================
    | Toggle staff homepage message status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $message = $this->staffHomepageMessageRepo->find($id, ['msg_id', 'status']);

        if (! $message) {
            return false;
        }

        return $this->staffHomepageMessageRepo->updateColumns($id, [
            'status' => ! $message->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an staff homepage message.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $message = $this->staffHomepageMessageRepo->find($id, ['profile_images']);

        if (! empty($message->profile_images) && Storage::disk('public')->exists($message->profile_images)) {
            Storage::disk('public')->delete($message->profile_images);
        }

        return $this->staffHomepageMessageRepo->delete($id);
    }
}
