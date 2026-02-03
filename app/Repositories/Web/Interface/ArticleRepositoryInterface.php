<?php

namespace App\Repositories\Web\Interface;

use App\Models\Admin\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /* ============================================================================
    |  Fetch articles with optional filters and selected columns.
    ==============================================================================*/
    public function getArticles(?array $filterData = null, ?array $selectedcolumns = null): ?Collection;

    /* ============================================================================
    |   Fetch a single article record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Article;
}
