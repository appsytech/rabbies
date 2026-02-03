<?php

namespace App\Services\Web;

use App\Models\Admin\Article;
use App\Repositories\Web\Interface\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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

    /* ============================================================================
    |   Fetch a single notice record by its primary ID.
    ==============================================================================*/
    public function find(string $encryptedId, ?array $selectedColumns = null): ?Article
    {
        $id = decrypt($encryptedId);

        return $this->articleRepo->find($id, $selectedColumns);
    }

    /* ============================================================================
    |  Fetch articles with optional filters and selected columns.
    ==============================================================================*/
    public function getArticles(?array $filterData = null, ?array $selectedcolumns = null): ?Collection
    {
        return $this->articleRepo->getArticles($filterData, $selectedcolumns);
    }
}
