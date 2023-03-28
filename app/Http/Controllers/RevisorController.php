<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('revisor');
    }
    public function dashboard(){
        $articles = Article::where('is_published', null)->get();
        return view('revisor-dashboard', compact('articles')); 
    }

    public function articleDetail(Article $article){
        return view ('article.detail', compact('article'));
    }

    public function choiceRequest(Article $article, $choice){
        $article->is_published = $choice;
        $article->update();

        return redirect(route('dashboard.revisor'));
    }

    public function deleteArticle(Article $article){
        $article->delete();

        return redirect(route('dashboard.revisor'));
    }
}
