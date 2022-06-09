<?php

namespace App\Http\Controllers\Manage;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;

class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->caption = $request->caption;
        $post->content = $request->content;

        if($request->hasFile('photo')) {
            $post->photo = $request->file('photo')->store('images/news', 'public');
        }

        $post->save();
        // info($request->all());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        info($request->all());

        $post->caption = $request->caption;
        $post->content = $request->content;
        $post->author = $request->author;
        $post->published = $request->published;

        if($request->hasFile('photo')) {
            if(Storage::disk('public')->exists($post->photo)) {
                unlink("storage/".$post->photo);
            }
            $post->photo = $request->file('photo')->store('images/news', 'public');
        }

        $post->update();

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Remove photo
        if(!empty($post->photo)) {
            if(Storage::disk('public')->exists($post->photo)) {
                unlink("storage/".$post->photo);
            }
        }
        
        $post->delete();

        return response()->noContent();
    }
}