<?php

namespace App\Models;


use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

protected $fillable = [
    'name'
];


// Many to manyin Tag
public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
