<?php

namespace App\Services\Admin;

use App\Models\Admin\Article;
use App\Repositories\Admin\Interfaces\ArticleRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ArticleRepositoryInterface $articleRepo
    ) {
        //
    }

    /* =============================================================
    | Create a new article record.
    ================================================================*/
    public function create($request): ?Article
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author ?? null,
            'authorPosition' => $request->author_position ?? null,
            'status' => $request->status ?? null,
            'articleType' => $request->article_type ?? null,
            'articleAuthorType' => $request->articles_author_type ?? null,

        ];

        if ($request->hasFile('author_profile_image')) {
            $data['authorProfileImage'] = $request->file('author_profile_image')->store('assets/images/articles', 'public');

        }

        if ($request->hasFile('images1')) {
            $data['images1'] = $request->file('images1')->store('assets/images/articles', 'public');

        }

        if ($request->hasFile('images2')) {
            $data['images2'] = $request->file('images2')->store('assets/images/articles', 'public');

        }

        return $this->articleRepo->create($data);
    }

    /* ============================================================================
    |   Fetch a single article record by its primary ID.
    ==============================================================================*/
    public function find(int $id, ?array $selectedColumns = null): ?Article
    {
        return $this->articleRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch articles with optional filters and selected columns.
    ==============================================================================*/
    public function getArticles(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->articleRepo->getArticles($filterData, $selectedcolumns);
    }

    /* ============================================================================
    | Update an existing article record .
    ==============================================================================*/
    public function update($request): bool
    {
        $articleId = $request->id;
        $article = $this->articleRepo->find($articleId, ['author_profile_image', 'images1', 'images2']);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author ?? null,
            'author_position' => $request->author_position ?? null,
            'status' => $request->status ?? null,
            'article_type' => $request->article_type ?? null,
            'articles_author_type' => $request->articles_author_type ?? null,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('author_profile_image')) {
            if (isset($article->author_profile_image) && Storage::disk('public')->exists($article->author_profile_image)) {
                Storage::disk('public')->delete($article->author_profile_image);
            }
            $data['author_profile_image'] = $request->file('author_profile_image')->store('assets/images/articles', 'public');
        }

        if ($request->hasFile('images1')) {
            if (isset($article->images1) && Storage::disk('public')->exists($article->images1)) {
                Storage::disk('public')->delete($article->images1);
            }
            $data['images1'] = $request->file('images1')->store('assets/images/articles', 'public');
        }

        if ($request->hasFile('images2')) {
            if (isset($article->images2) && Storage::disk('public')->exists($article->images2)) {
                Storage::disk('public')->delete($article->images2);
            }
            $data['images2'] = $request->file('images2')->store('assets/images/articles', 'public');
        }

        return $this->articleRepo->updateColumns($articleId, $data);
    }

    /* ============================================================================
    | Permanently delete an artcle.
    ==============================================================================*/
    public function delete(int $id): bool
    {
        $article = $this->articleRepo->find($id, ['author_profile_image', 'images1', 'images2']);

        if (! empty($article->author_profile_image) && Storage::disk('public')->exists($article->author_profile_image)) {
            Storage::disk('public')->delete($article->author_profile_image);
        }

        if (! empty($article->images1) && Storage::disk('public')->exists($article->images1)) {
            Storage::disk('public')->delete($article->images1);
        }

        if (! empty($article->images2) && Storage::disk('public')->exists($article->images2)) {
            Storage::disk('public')->delete($article->images2);
        }

        return $this->articleRepo->delete($id);
    }
}
