<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['caption', 'author', 'photo', 'content', 'published'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function photo()
    {
        return $this->photo ? asset('storage/'.$this->photo) : "";
    }

    public static function booted()
    {
        static::creating(function($post){
            $post->slug = Str::slug($post->caption);
        });
    }
}