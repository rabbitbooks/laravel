<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //protected $table = 'my_news';
    //protected $primaryKey = 'news_id';
    //public $timestamps = false;

    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function rules() {
      //  $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:5|max:20',
            'text' => 'required|min:5',
            'category_id' => "required|exists:App\Models\Category,id",
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    public function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => 'Категория новости',
            'image' => 'Изображение'
        ];
    }
}
