<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use HasFactory, Searchable;
    protected $fillable = [
        'title',
        'description',
        'body',
        'img',
        'category_id'
    ];
    public function toSearchableArray()
    {
        $category = $this->category;
        if ($category) {
            return[
                'id'=>$this->id,
                'title'=>$this->title,
                'category'=>$this->category->name,
                'author'=>$this->user->name,
            ];           
        }else{
            return [
                'id'=>$this->id,
                'title'=>$this->title,
                'author'=>$this->user->name,
            ];
        }

        $article = $this->article;
        if ($article) {
            return[
                'id'=>$this->id,
                'title'=>$this->title,
                'category'=>$this->category->name,
                'author'=>$this->user->name,
            ];           
        }else{
            return [
                'title'=>$this->title,
                'category'=>$this->category->name,
                'author'=>$this->user->name,
            ];
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function RevisorArticlesCount(){
        return self::where('is_published', null)->count();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}


