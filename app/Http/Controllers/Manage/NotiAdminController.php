<?php

namespace App\Http\Controllers\Manage;

use App\Models\Noti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotiResource;

class NotiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NotiResource::collection(Noti::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Noti::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noti  $noti
     * @return \Illuminate\Http\Response
     */
    public function show(Noti $notify)
    {
        return new NotiResource($notify);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noti  $noti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noti $notify)
    {
        $notify->update($request->all());

        return new NotiResource($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noti  $noti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noti $notify)
    {
        $notify->delete();

        return response()->noContent();
    }
}
