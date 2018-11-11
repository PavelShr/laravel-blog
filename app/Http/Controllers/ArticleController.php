<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

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
            'category_id' => $request->post('category_id', 0),
        ]);
        if (!$saved) {
            return response('Article not saved.', 400);
        }

        unset($saved['post_text']);
        return $saved;
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
        $article['comments'] = $article->comments();
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return array|string
     */
    public function update(Request $request, $id)
    {
        $updatedData = $request->post();

        $updated = Article::findOrFail($id)
                    ->update($updatedData);

        if (!$updated) {
            return response('Article not updated.', 400);
        }

        return $updatedData;
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
            return response('Error', 400);
        }
        return 'OK';
    }
}
