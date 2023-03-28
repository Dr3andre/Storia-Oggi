<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('writer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $article =Auth::user()->articles()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'body'=>$request->body,
            'img'=>$request->file('img')->store('public/img'),
            'category_id'=> $request->category
        ]);
        
        $tags = explode(',', $request->tags);

        for ($i=0; $i< count($tags); $i++){ 

            $tags[$i] = trim($tags[$i]," ");

        };

        foreach ($tags as $tag) {    
            $article->tags()->create(['name'=>$tag]);
        } 
        

        return redirect(route('homepage'))->with('message','Il tuo articolo è stato inserito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        
    }

    public function userArticles(User $user){
        $articles = $user->articles()->where('is_published',true)->get();

        return view('user-articles', compact('user','articles'));
    }

    public function categoryArticles(Category $category){
        $articles = $category->articles()->where('is_published',true)->get();

        return view('category-articles', compact('category','articles'));
    }
}
