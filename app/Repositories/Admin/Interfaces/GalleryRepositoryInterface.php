<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\GalleryImage;
use Illuminate\Database\Eloquent\Collection;

interface GalleryRepositoryInterface
{
    /* ============================================================================
    | Create a new gallery record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?GalleryImage;

    /* ============================================================================
    |   Fetch a single gallery image record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?GalleryImage;

    /* ============================================================================
    |  Fetch gallery images with optional filters and selected columns.
    ==============================================================================*/
    public function getGalleryImages(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing agllery image record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing gallery image record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
