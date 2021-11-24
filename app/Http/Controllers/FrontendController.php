<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home', [
            'dataKategori' => Category::get(),
            // 'newsTerbaru' => Article::where('category_id', '1')->orWhere('category_id', '12')->latest()->take(1)->get(),
            'articleNews' => Article::where('category_id', '1')->latest()->take(5)->get(),
        ]);
    }

    public function allArticle()
    {
        return view('article.all', [
            'dataTag' => Tag::get(),
            'dataKategori' => Category::get(),
            'allarticles' => Article::latest()->take(4)->get(),
            'articles' => Article::latest()->paginate(4)
        ]);
    }

    public function showArticle(Article $article)
    {
        $articles = Article::where('category_id', $article->category_id)->latest()->limit(5)->get();
        $dataKategori = Category::get();
        return view('article.show', compact('article', 'articles', 'dataKategori'));
    }

    public function showCategory(Category $category)
    {
        $articles = $category->articles()->latest()->paginate(5);
        $allarticles = Article::latest()->take(4)->get();
        $dataKategori = Category::get();
        $dataTag = Tag::get();
        return view('article.all', compact('allarticles', 'articles', 'category', 'dataKategori', 'dataTag'));
    }

    public function showTag(Tag $tag)
    {
        $articles = $tag->articles()->latest()->paginate(5);
        $allarticles = Article::latest()->take(4)->get();
        $dataKategori = Category::get();
        $dataTag = Tag::get();
        return view('article.all', compact('allarticles', 'articles', 'tag', 'dataKategori', 'dataTag'));
    }

    public function search()
    {
        $query = request('q');

        $allarticles = Article::latest()->take(4)->get();
        $dataKategori = Category::get();
        $dataTag = Tag::get();
        $articles = Article::where("title", "like", "%$query%")->latest()->paginate(4);
        return view('article.all', compact('allarticles', 'articles', 'dataKategori', 'dataTag', 'query'));
    }

    public function aboutus()
    {
        return view('frontend.about', [
            'dataKategori' => Category::get()
        ]);
    }

    public function contact()
    {
        return view('frontend.contact', [
            'dataKategori' => Category::get()
        ]);
    }
}
