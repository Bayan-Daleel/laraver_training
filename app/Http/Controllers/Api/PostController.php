<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePosRequest;
use App\Http\Resources\PostResource;
use App\Models\post;
use Illuminate\Http\Request;

class   PostController extends Controller
{
    public function index()
    {
       $post=Post::all();
       return PostResource::collection($post);
    }

    public function create()
    {
        //
    }


    public function store(StorePosRequest $request)
    {
        $posts=Post::create($request->all());
        return new PostResource($posts);
    }

    public function show($id)
    {
       return $post=Post::find($id);
    }

    public function edit(post $post)
    {
        //
    }


    public function update(StorePosRequest $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return new PostResource($post);

    }
    public function destroy($id)
    {

        $post=Post::find($id)->delete();
        return response('the post deleted',200);
    }
}
