<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{

    /**
     * Display a listing of the articles.
     *
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $articles = Article::all();

        return $articles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return array|string
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->post('title');
        $article->preview_image = $request->post('preview_image', '');
        $article->post_text = $request->post('post_text');
        $article->author_id = $request->user()->id;
        $saved = $article->save();
        if (!$saved) {
            return response('Article not saved.', 500);
        }

        return 'OK';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreArticleRequest $request
     * @param  int $id
     * @return void
     */
    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->post('title');
        $article->preview_image = $request->post('preview_image', '');
        $article->post_text = $request->post('post_text');
        $article->author_id = $request->user()->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return string
     */
    public function destroy($id)
    {
        $deleted = Article::destroy($id);
        if (!$deleted) {
            return response('Error', 500);
        }
        return 'OK';
    }
}
