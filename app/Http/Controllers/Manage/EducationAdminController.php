<?php

namespace App\Http\Controllers\Manage;

use App\Models\Education;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\EducationResource;

class EducationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EducationResource::collection(Education::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $education = new Education;
        $education->title = $request->title;
        $education->category_id = $request->category_id;
        $education->content = $request->content;
        $education->author = $request->author;

        if($request->hasFile('photo')) {
            $education->photo = $request->file('photo')->store('images/education', 'public');
        }

        $education->save();

        return new EducationResource($education);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        return new EducationResource($education);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, Education $education)
    {
        $education->slug = ($education->title === $request->title) ? $education->slug : Str::slug($request->title);
        $education->title = $request->title;
        $education->category_id = $request->category_id;
        $education->content = $request->content;
        $education->author = $request->author;
        $education->visible = isset($request->visible) ? 1 : 0;

        if($request->hasFile('photo')) {
            if(Storage::disk('public')->exists($education->photo)) {
                unlink("storage/".$education->photo);
                // Storage::delete($education->photo);
            }
            $education->photo = $request->file('photo')->store('images/education', 'public');
        }

        $education->update();

        return new EducationResource($education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        // Remove photo
        if(!empty($education->photo)) {
            if(Storage::disk('public')->exists($education->photo)) {
                unlink("storage/".$education->photo);
                // Storage::delete($education->photo);
            }
        }
        
        $education->delete();

        return response()->noContent();
    }
}
