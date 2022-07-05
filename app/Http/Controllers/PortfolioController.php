<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PortfolioResource::collection(auth()->user()->portfolios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        // CHECK IF ASSETS EXISTS AND MERGE, OR CREATE IF NEW
        $checked = Portfolio::where('coin_id', $request->coin_id)
                            ->where('user_id', auth()->user()->id)
                            ->first();
        if($checked) {
            $portfolio = $this->merge_portfolio($checked, $request);
        }
        else {
            $portfolio = auth()->user()->portfolios()->create($request->only(['coin_id', 'value_of_asset']));
        }

        $portfolio->portfolio_logs()->create($request->only(['value_of_asset']));

        return new PortfolioResource($portfolio);
    }

    protected function merge_portfolio($model, $request)
    {
        if(!$model || !$request) return;

        $initial = $model->value_of_asset;
        $new = $request->value_of_asset;

        $sum = $initial + $new;

        $model->update([
            'value_of_asset' => $sum
        ]);

        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return new PortfolioResource($portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        $portfolio->portfolio_logs()->delete();
    }
}
