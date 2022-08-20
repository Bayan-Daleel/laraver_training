<x-layout>
    {{-- <x-_posts-header/> --}}
    @include('layout._posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>
        @else
            <h1 class="text-center text-4xl">no post yet ,please check back leater</h1>
        @endif
        {{--  <div class="lg:grid lg:grid-cols-3">
           <x-post-card/>
           <x-post-card/>
           <x-post-card/>
         </div> --}}
    </main>

    {{-- <!-- @foreach ($posts as $post)
          <article {{-- style="background-color:{{$loop->even ? 'green' : ' '}}" >
           <h1>
           <a href="/posts/{{$post->slug}}">
           {!! $post->title!!}
           </a>
       </h1>

       <span style="font-size: 15px">
        By <a href="/author/{{$post->author->user_name}}">{{$post->author->name}}</a> , <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
      </span>
           <p>
             {!!$post->excerpt!!}
           </p>
           </article>
           @endforeach
          -->
         {{--   <x-button>
              <a href="google.com">hello</a>
           </x-button> --}}--}}
</x-layout>

{{-- @endsection --}}
