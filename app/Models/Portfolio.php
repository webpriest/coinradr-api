<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'coin_id', 'value_of_asset'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function portfolio_logs()
    {
        return $this->hasMany(PortfolioLog::class);
    }
}
