<?php

namespace App\Http\Controllers;

use App\Models\Noti;
use Illuminate\Http\Request;
use App\Http\Resources\NotifyResource;

class NotiController extends Controller
{
    public function __invoke()
    {
        return new NotifyResource(Noti::where('visible', 1)->latest()->first());
    }
}
