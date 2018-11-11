<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $saved = Category::create([
            'name' => $request->post('name'),
            'description' => $request->post('description', null),
            'image' => $request->post('description', null),
        ]);
        if (!$saved) {
            return response('Article not saved.', 400);
        }

        return $saved;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|string
     */
    public function update(Request $request, $id)
    {
        $updatedData = $request->post();

        $updated = Category::findOrFail($id)
            ->update($updatedData);

        if (!$updated) {
            return response('Category not updated.', 400);
        }

        return $updatedData;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        $deleted = Category::destroy($id);
        if (!$deleted) {
            return response('Error', 400);
        }
        return 'OK';
    }
}
