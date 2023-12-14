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
        'user_id',
        // 'tag',
        'post_image'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // public function hasComments($role){
    //     return null !== $this->roles()->where('name', $role)->first();
    // }

    

}