<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin'); 
    }
    
    public function dashboard(){
        $userRequests = User::where('role', '!=', NULL)->get();
        return view('admin-dashboard', compact('userRequests')); 
    }
    
    public function acceptRequest(User $user, $choice){
        if ($choice){
            switch ($user->role) {
                case 'admin':
                    $user->update(['is_admin'=>true,
                    'role'=>null,
                ]);
                break;
                case 'revisor':
                    $user->update(['is_revisor'=>true,
                    'role'=>null,
                ]);
                break;
                case 'writer':
                    $user->update(['is_writer'=>true,
                    'role'=>null,
                ]);
                break;
                default:
                
                break;
            }
        } else {
            switch ($user->role) {
                case 'admin':
                    $user->update([
                        'role'=>null,
                    ]);
                    break;
                    case 'revisor':
                        $user->update([
                            'role'=>null,
                        ]);
                        break;
                        case 'writer':
                            $user->update([
                                'role'=>null,
                            ]);
                            break;
                            default:
                            
                            break;
                        } 
                    }     
                    return redirect()->back();
                }




    public function update(Request $request, Tag $tag){
        $tag->update(['name'=>$request->tag]);

        return redirect()->back()->with('messageTag','Tag modificato');
    }

    public function destroy(Tag $tag){
        
        $tag->articles()->detach();
        $tag->delete();

        return redirect()->back()->with('messageTag','Tag eliminato');

    }

    public function updateCategory(Request $request, Category $category){
        $category->update(['name'=>$request->category]);

        return redirect()->back()->with('messageCategory','Categoria modificata');
    }

    public function destroyCategory(Category $category){
        foreach ($category->articles() as $article) {
            $article->category()->dissociate();
            $article->save(); 
        }
            $category->delete();

        return redirect()->back()->with('messageCategory','Categoria eliminata');

    }


    

    
}
