<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use App\Http\Resources\InsightResource;

class InsightController extends Controller
{
    public function insights()
    {
        return InsightResource::collection(Insight::latest()->get());
    }

    public function insight($coin)
    {
        return new InsightResource(Insight::where('coin_id', $coin)->first());
    }
    
    public function latest()
    {
        return new InsightResource(Insight::latest()->first());
    }
}
