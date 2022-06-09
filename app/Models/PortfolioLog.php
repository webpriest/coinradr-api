<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioLog extends Model
{
    use HasFactory;

    protected $fillable = ['portfolio_id', 'value_of_asset'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
