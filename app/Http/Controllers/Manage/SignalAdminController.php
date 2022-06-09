<?php

namespace App\Http\Controllers\Manage;

use App\Models\Signal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SignalResource;

class SignalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SignalResource::collection(Signal::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $signal = Signal::create($request->only('pair', 'price', 'move', 'tp', 'sl', 'duration', 'description'));

        return new SignalResource($signal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function show(Signal $signal)
    {
        return new SignalResource($signal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signal $signal)
    {
        $signal->update($request->only('pair', 'price', 'move', 'tp', 'sl', 'duration', 'description'));

        return new SignalResource($signal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signal $signal)
    {
        $signal->delete();

        return response()->noContent();
    }
}
