<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'content', 'visible', 'author', 'photo'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photo()
    {
        return $this->photo ? asset('storage/'.$this->photo) : "";
    }

    public static function booted()
    {
        static::creating(function($education){
            $education->slug = Str::slug($education->title);
        });
    }
}
