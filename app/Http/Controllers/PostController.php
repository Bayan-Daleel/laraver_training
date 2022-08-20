<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{

    public function index()
    {
       // DB::Listen(function($query){
         // logger($query->sql,$query->bindings);
       // });
        return view('posts.index', [
            //'posts'=>Post::all(),
            'posts'=>Post::latest()->filter(\request(['search','category','author']))->get(),
            //with('Category')->get(),
          ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
    $post=Post::where(['slug' => $slug])->first();
        return view('posts.post', [
            'post'=>$post,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
