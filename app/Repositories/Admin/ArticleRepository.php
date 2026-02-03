<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Article;
use App\Repositories\Admin\Interfaces\ArticleRepositoryInterface;
use Carbon\Carbon;
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
    | Create a new article record in the database and returns the created record.
    ==============================================================================*/
    public function create(array $data): ?Article
    {
        return Article::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'author' => $data['author'] ?? null,
            'author_position' => $data['authorPosition'] ?? null,
            'author_profile_image' => $data['authorProfileImage'] ?? null,
            'status' => $data['status'] ?? null,
            'article_type' => $data['articleType'] ?? null,
            'articles_author_type' => $data['articleAuthorType'] ?? null,
            'images1' => $data['images1'] ?? null,
            'images2' => $data['images2'] ?? null,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
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
            isset($filterData['title']),
            function ($query) use ($filterData) {
                $query->where('title', 'LIKE', '%'.$filterData['title'].'%');
            }
        )
            ->when(
                isset($filterData['articleType']),
                function ($query) use ($filterData) {
                    $query->where('article_type', $filterData['articleType']);
                }
            )
            ->when(
                isset($filterData['status']),
                function ($query) use ($filterData) {
                    $query->where('status', $filterData['status']);
                }
            )
            ->when(
                isset($selectedcolumns) && count($selectedcolumns) >= 1,
                function ($query) use ($selectedcolumns) {
                    return $query->select($selectedcolumns);
                }
            )
            ->get();
    }

    /* ============================================================================
    |Update specific columns of an existing article record.
    ==============================================================================*/
    public function updateColumns(int $id, array $data): bool
    {
        return Article::where('id', $id)->update($data);
    }

    /* ================================================
     |Delete existing article record by its id.
     ==================================================*/
    public function delete(int $id): bool
    {
        return Article::where('id', $id)->delete();
    }
}
