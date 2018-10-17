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
        $articles = Article::paginate(10);

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
        $saved = Article::create([
            'title' => $request->post('title'),
            'preview_image' => $request->post('preview_image', ''),
            'post_text' => $request->post('post_text'),
            'author_id' => $request->user()->id,
        ]);
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
        $updated = Article::findOrFail($id)
                    ->update([
                        'title' => $request->post('title'),
                        'preview_image' => $request->post('preview_image', ''),
                        'post_text' => $request->post('post_text'),
                        'author_id' => $request->user()->id,
                    ]);

        if (!$updated) {
            return response('Article not updated.', 500);
        }
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
