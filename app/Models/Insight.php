<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insight extends Model
{
    use HasFactory;

    protected $fillable = ['coin_id', 'title', 'excerpt', 'description', 'featured', 'photo'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function photo()
    {
        return $this->photo ? asset('storage/'.$this->photo) : "";
    }

    public static function booted()
    {
        static::creating(function($insight){
            $insight->token = Str::random(16);
        });
    }
}
