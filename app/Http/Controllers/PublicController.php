<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RoleMail;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage() {
        $articles = Article::where('is_published', true)->orderByDesc('created_at')->take(6)->get();
        
        return view('welcome', compact('articles'));
    }

    public function articleDetail( $id){
        $article = Article::find($id);
    return view('article.detail', compact('article'));
    }
    
    public function workWithUs(){
        return view('work-with-us');
    }

    public function workWithUsSubmit(RoleRequest $request){
        
        $user = User::where('email', $request->email)->first();

        if ($user) {
        $contact = new Contact;
        $contact->name = $request->userName;
        $contact->role = $request->role;
        $contact->email = $request->email;
        $contact->message = $request->message;

        Mail::to('amministrazione@sito.it')->send(new RoleMail($contact));
            $user->role = $request->role;
            $user->update();
        }else {
            return redirect(route('register'))->with('message', 'Ti devi prima registrare');
        }

        return redirect(route('homepage'))->with('message', 'Grazie per la tua richiesta, ti risponderemo al più presto');
        
            
        
    }

    public function searchArticle(Request $request){
        $search =$request->search;
        $articles = Article::search($search)->where('is_published', true)->get();
        return view('search-articles', compact('articles', 'search'));
    }

    
}
