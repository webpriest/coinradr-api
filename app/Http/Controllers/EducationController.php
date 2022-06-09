<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Resources\EducationResource;

class EducationController extends Controller
{
    public function index()
    {
        return EducationResource::collection(Education::latest()->get());
    }
    
    public function show(Education $education)
    {
        return new EducationResource($education);
    }
}
