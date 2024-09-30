<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')
            ->where('active', true)
            ->latest()->get();

        return view('pages.blog.blog', [
            'articles' => $articles,
        ]);
    }

    public function article(Article $article)
    {
        abort_if(! $article->active, 404);

        //        \View::share(['schema' => ['article' => app(SchemaOrg::class)->article($article->load('user'))]]);

        return view('pages.blog.article', ['article' => $article->load('user')]);
    }
}
