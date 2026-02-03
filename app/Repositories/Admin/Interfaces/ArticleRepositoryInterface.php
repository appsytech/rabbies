<?php

namespace App\Repositories\Admin\Interfaces;

use App\Models\Admin\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /* ============================================================================
    | Create a new article record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Article;

    /* ============================================================================
    |   Fetch a single article record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Article;

    /* ============================================================================
    |  Fetch articles with optional filters and selected columns.
    ==============================================================================*/
    public function getArticles(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |Update specific columns of an existing article record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool;

    /* ================================================
     |Delete existing article record by its id.
     ==================================================*/
    public function delete(int $id): bool;
}
