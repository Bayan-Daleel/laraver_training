
<x-layout>
        @foreach ($posts as $post)
        <article {{-- style="background-color:{{$loop->even ? 'green' : ' '}}" --}}>
         <h1>
         <a href="/posts/{{$post->slug}}">
         {!! $post->title!!}
         </a>
     </h1>
    
     <span style="font-size: 15px"> 
      <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
    </span>
         <p>
           {!!$post->excerpt!!}  
         </p>
         </article>
         @endforeach
       {{--   <x-button>
            <a href="google.com">hello</a>
         </x-button> --}}
</x-layout>

{{-- @endsection --}}