<?php

namespace App\Http\Controllers;

use App\Models\Signal;
use Illuminate\Http\Request;
use App\Http\Resources\SignalResource;

class SignalController extends Controller
{
    public function signals()
    {
        return SignalResource::collection(Signal::latest()->get());
    }
    
    public function signal(Signal $signal)
    {
        return new SignalResource($signal);
    }
}
