<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.index', ['dataArticle' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.add', [
            'dataKategori' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // dd($request->all());

        $fileType = $request->file('thumbnail')->extension();
        $name = \Str::random(8) . '.' . $fileType;

        $attr = $request->all();
        $slug = \Str::slug(request('title'));
        $attr['user_id'] = auth()->id();
        $attr['slug'] = $slug;

        $new_cover = \Storage::putFileAs('cover', $request->file('thumbnail'), $name);
        // if ($request->file(cover)) {
        // }
        $attr['cover'] = $new_cover;

        Article::create($attr);

        return redirect()->route('article.index')->with('success', 'Data Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
            'dataKategori' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'cover' => 'mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if ($request->file('cover')) {
            $fileType = $request->file('cover')->extension();
            $name = \Str::random(8) . '.' . $fileType;

            unlink(public_path('storage/' . $article->cover));
            $new_cover = \Storage::putFileAs('cover', $request->file('cover'), $name);
        } else {
            $new_cover = $article->cover;
        }

        $attr = $request->all();
        $attr['cover'] = $new_cover;
        $slug = \Str::slug(request('title'));
        $attr['category_id'] = request('category_id');
        $attr['user_id'] = auth()->id();
        $attr['slug'] = $slug;

        $article->update($attr);

        return redirect()->route('article.index')->with('success', 'Data article berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
