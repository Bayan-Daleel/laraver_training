<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">
                Publish new post
            </h1>
            <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.texterea name="excerpt"/>
                <x-form.texterea name="body"/>
                <div class="mt-6">
                <label class="block mb-3 uppercase font-bold text-xs text-gray-700">{{ucwords('category')}} </label>
                <select  id="category_id" name="category_id" class="bg-gray-50  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                   @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
                </div>

                <button type="submit "
                            class="bg-blue-400 mt-6 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>

                {{--                @if($errors->any())--}}
                {{--                    <ul>--}}
                {{--                        @foreach($errors->all() as $error)--}}
                {{--                            <li class="text-red-500 text-xs mt-2">{{ $error }}</li>--}}
                {{--                        @endforeach--}}
                {{--                    </ul>--}}
                {{--                @endif--}}
            </form>
        </main>
    </section>
</x-layout>
