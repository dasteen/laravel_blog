<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // у модели Post автоматическая привязка к таблице Posts
    // если таблица названа другим именем, нужно ее привязать выручную
//    protected $table = "my_posts";
    
    //если первичный ключ имеет имя не id - привязать вручную
//    protected $primaryKey = "my_id";
    
    // разрешение заполнять поля из массива
    protected $fillable = ['title', 'alias', 'intro', 'body'];
    
    // запрет на заполнение полей из массива
//    protected $guarded = ['alias'];
    
    public function getRouteKeyName() {
        return 'alias';
    }
}
