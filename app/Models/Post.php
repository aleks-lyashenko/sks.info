<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    
    //Свойство attributes нужно, чтобы laravel заполнял свойства автоматически, если они не заполнены явно
    protected $attributes = [
        'text' => 'Здесь этот текст, потому что поле не было заполнено автором'
    ];
    //Свойство fillable/guarded разрешает массовое назначение полей через create()
    protected $fillable = [
        'title', 'text', 'rubric_id'
    ];

    public function rubric () {
        return $this->belongsTo(Rubric::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    //создаем мутатор, изменяющий наименование
    public function setTitleAttribute($value) {
        //преобразуем имя статьи к другому формату
        $this->attributes['title'] = Str::title($value);
    }

    //аксессор
    public function getTitleAttribute($value) {
        //показывает имя статьи в Upper-виде, а в БД они хранятся также
        return Str::upper($value);
    }
}
