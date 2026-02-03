<?php

namespace App\Repositories\Web;

use App\Models\Admin\Article;
use App\Repositories\Web\Interface\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /* ============================================================================
    |   Fetch a single article record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Article
    {
        return Article::where('id', $id)
            ->when(
                isset($selectedColumns) && count($selectedColumns) >= 1,
                function ($query) use ($selectedColumns) {
                    return $query->select($selectedColumns);
                }
            )
            ->first();
    }

    /* ============================================================================
    |  Fetch articles with optional filters and selected columns.
    ==============================================================================*/
    public function getArticles(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return Article::when(
            isset($filterData['articlesAuthorType']),
            function ($query) use ($filterData) {
                $query->where('articles_author_type', $filterData['articlesAuthorType']);
            }
        )
            ->when(
                isset($filterData['exceptId']) && is_numeric($filterData['exceptId']),
                function ($query) use ($filterData) {
                    return $query->where('id', '!=', $filterData['exceptId']);
                }
            )
            ->when(
                isset($filterData['limit']) && is_numeric($filterData['limit']),
                function ($query) use ($filterData) {
                    return $query->limit($filterData['limit']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->where('status', true)
            ->get();
    }
}
