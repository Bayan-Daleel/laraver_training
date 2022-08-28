<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosRequest;
use App\Models\Post;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Monolog\Handler\IFTTTHandler;
use PhpParser\Node\Expr\AssignOp\Pow;
use App\Http\Requests;
use App\User;

class PostController extends Controller
{

    public function index()
    {
       // DB::Listen(function($query){
         // logger($query->sql,$query->bindings);
       // });
       /* return view('posts.index', [
            //'posts'=>Post::all(),
           // 'posts'=>Post::latest()->filter(\request(['search','category','author']))->get(),
            //with('Category')->get(),
            'posts'=>Post::latest()->filter(\request(['search','category','author']))->paginate(6 )->withQueryString() ,
        ]);*/

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       \Gate::allows('admin');

       /* if (auth()->guest()){
            //abort(403);
            return redirect('/');
        }*/
     //  $this->authorize('admin');

        return view('posts.create');
    }



    public function store(StorePosRequest $request)
    {
      //  dd('hello');
        //dd(\request()->all());
        /*$attributes=\request()->validate([

        ]);*/
        //  dd($attributes);
        $attributes=$request->all();
        $attributes['user_id']=auth()->id();
        $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnail');
        //dd($attributes);
        Post::create($attributes);
        return redirect('/');
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
