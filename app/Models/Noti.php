<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noti extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'content', 'visible'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public static function booted()
    {
        static::creating(function($noti){
            $noti->token = Str::random(16);
        });
    }
}
