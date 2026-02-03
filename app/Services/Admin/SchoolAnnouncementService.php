<?php

namespace App\Services\Admin;

use App\Models\Admin\SchoolAnnouncement;
use App\Repositories\Admin\Interfaces\SchoolAnnouncementRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SchoolAnnouncementService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SchoolAnnouncementRepositoryInterface $schoolAnnouncementRepo
    ) {
        //
    }

    /* =============================================================
    | Create a new school announcement record.
    ================================================================*/
    public function create($request): ?SchoolAnnouncement
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'publish_date' => $request->publish_date,
            'expiry_date' => $request->expiry_date ?? null,
            'posted_by' => Auth::user()->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/images/school-annoucements', 'public');
        }

        return $this->schoolAnnouncementRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single school announcement record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?SchoolAnnouncement
    {
        return $this->schoolAnnouncementRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch school announcements with optional filters and selected columns.
    ==============================================================================*/
    public function getSchoolAnnouncements(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->schoolAnnouncementRepo->getSchoolAnnouncements($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing school announcement record .
    ==============================================================================*/
    public function update($request): bool
    {
        $annoucementId = $request->id;
        $annoucement = $this->schoolAnnouncementRepo->find($annoucementId, ['image']);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'publish_date' => $request->publish_date,
            'expiry_date' => $request->expiry_date ?? null,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            if (isset($annoucement->image) && Storage::disk('public')->exists($annoucement->image)) {
                Storage::disk('public')->delete($annoucement->image);
            }
            $data['image'] = $request->file('image')->store('assets/images/school-annoucements', 'public');
        }

        return $this->schoolAnnouncementRepo->updateColumns($annoucementId, $data);
    }

    /* ============================================================================
    | Toggle school announcement status.
    ==============================================================================*/
    public function updateStatus(int $id): bool
    {
        $announcement = $this->schoolAnnouncementRepo->find($id, ['id', 'status']);

        if (! $announcement) {
            return false;
        }

        return $this->schoolAnnouncementRepo->updateColumns($id, [
            'status' => ! $announcement->status,
        ]);
    }

    /* ============================================================================
    | Permanently delete an school announcement.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $annoucement = $this->schoolAnnouncementRepo->find($id, ['image']);

        if (! empty($annoucement->image) && Storage::disk('public')->exists($annoucement->image)) {
            Storage::disk('public')->delete($annoucement->image);
        }

        return $this->schoolAnnouncementRepo->delete($id);
    }
}
