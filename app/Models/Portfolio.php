<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'token', 'coin_id', 'value_of_asset'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function portfolio_logs()
    {
        return $this->hasMany(PortfolioLog::class);
    }

    public static function booted()
    {
        static::creating(function($portfolio){
            $portfolio->token = Str::random(16);
        });
    }
}
