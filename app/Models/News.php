<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    //protected $table = 'my_news';
    //protected $primaryKey = 'news_id';
    //public $timestamps = false;

    protected $fillable = ['title', 'text', 'isPrivate', 'category_id', 'image'];


    public function category() {
        return $this->belongsTo(Category::class);
    }


}
