@auth()
<form method="POST" action="/posts/{{$post->slug}}/comments" class="border border-gray--200 p-6 rounded-xl">
    @csrf
    <header class=" flex items-center ">
        <img src="https://i.pravatar.cc/60?u={{auth()->user()->id}}" width="60" height="60" alt="" class="rounded-full">
        <h2 class="ml-4">want to particepant</h2>
    </header>
    <div class="mt-4">
        <textarea class="w-full text-sm focus:outline-none focus:ring"
            name="body"
                  id="body"
                  cols="50"
                  placeholder="Quick,thing of something to say !"
                  required
                  rows="5">

        </textarea>
        @error('body')
        <span class="text-xs text-red-500">{{$message}}</span>
        @enderror
    </div>
    <div class="flex justify_end mt-t pt-6 border-t border-gray-200">
        <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
            Post
        </button>
    </div>
</form>
@else
    <p class="front-semibold"></p>
    <a  href="/register" class="hover:underline">register</a> or <a href="/login" class="hover:underline" >login</a> to add comment
@endauth
