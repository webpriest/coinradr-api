<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['middleware'=>'auth:sanctum']);
    // }

    public function __invoke()
    {
        return Inertia::render('Dashboard');
    }
}
