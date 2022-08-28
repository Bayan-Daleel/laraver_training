@props(['name'])
<div class="mt-6">
    <label class="block mb-3 uppercase font-bold text-xs text-gray-700"
           for={{$name}}
    >
        {{ucwords($name)}}

        <textarea class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring mt-2"
                  name={{$name}}
                  id={{$name}}
                  cols="50"
                  placeholder="Quick,thing of something to say !"
                  required
                  rows="5">
        {{old('$name')}}
        </textarea>
    @error('$name')
    <span class="text-xs text-red-500">{{$message}}</span>
    @enderror
</div>
