<?php

namespace App\Http\Controllers\Manage;

use App\Models\Insight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsightResource;
use Illuminate\Support\Facades\Storage;

class InsightAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InsightResource::collection(Insight::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insight = new Insight;
        $insight->coin_id = $request->coin_id;
        $insight->title = $request->title;
        $insight->excerpt = $request->excerpt;
        $insight->description = $request->description;

        if($request->hasFile('photo')) {
            $insight->photo = $request->file('photo')->store('images/insight', 'public');
        }

        $insight->save();

        return new InsightResource($insight);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function show(Insight $insight)
    {
        return new InsightResource($insight);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insight $insight)
    {
        $insight->coin_id = $request->coin_id;
        $insight->title = $request->title;
        $insight->excerpt = $request->excerpt;
        $insight->description = $request->description;

        if($request->hasFile('photo')) {
            if(Storage::disk('public')->exists($insight->photo)) {
                unlink("storage/".$insight->photo);
            }

            $insight->photo = $request->file('photo')->store('images/insight', 'public');
        }

        $insight->update();

        return new InsightResource($insight);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insight  $insight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insight $insight)
    {
        if(Storage::disk('public')->exists($insight->photo)) {
            unlink("storage/".$insight->photo);
        }
        
        $insight->delete();

        return response()->noContent();
    }
}
