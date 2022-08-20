<x-dropdown/>
<x-slot name="trigger">
    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
    </button>
</x-slot>

    <!--
  <options=bold>“ Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. ”</>
  <fg=gray>— Immanuel Kant</>
 -->
<x-dropdown-item href="/" :active="request()->routeIs('home')">
    ALL
</x-dropdown-item>

@foreach($categories as $category)
<x-dropdown-item
    href="/?category/{{$category->slug}}"
    :active='request()->is("categories/{$category->slug}")'
>
        {{ucwords($category->name)}}
</x-dropdown-item>
@endforeach
</x-dropdown>


