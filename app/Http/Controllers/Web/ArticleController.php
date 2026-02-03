<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\Web\ArticleService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    ) {}

    public function show(Request $request): View
    {
        $article = $this->articleService->find($request->id);
        $data = [
            'article' => $article,
            'relatedArticles' => $this->articleService->getArticles([
                'exceptId' => $article->id,
                'limit' => 5,
                'articlesAuthorType' => $article->articles_author_type,
            ], [
                'id', 'title', 'author', 'created_at', 'images1',
            ]),
        ];

        return view('web.pages.article.article-show', compact('data'));
    }
}
