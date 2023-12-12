<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tag',
        // 'post_image'
    ];

    public function posts(){
        return $this->belongsToMany(Tag::class);
        return $this->hasOne(User::class);
    }


}