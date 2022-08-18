{{-- @extends('layout')

@section('my-header')
<h1>صفحة المقالات</h1>
@endsection
@section('content') --}}

<x-layout>
    <article>
        <h1><?=$post_content->title?></h1>
            <img src="{{$post_content->img}}" alt="">
           
      <p style="font-size: 15px"> 
  By<a href="#">bayan ,</a> <a href="/categories/{{$post_content->category->id}}">{{$post_content->category->name}}</a>
         </p>
                  <div>
                {!!$post_content->body!!}
                </div>
        </article>
        
        <a href="/">Go Back</a>
</x-layout>


{{-- @endsection
 --}}