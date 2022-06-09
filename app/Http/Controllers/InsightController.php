<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use App\Http\Resources\InsightResource;

class InsightController extends Controller
{
    public function insight()
    {
        return new InsightResource(Insight::latest()->first());
    }
}
