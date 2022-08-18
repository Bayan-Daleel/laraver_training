<x-layout>
  <div class="row mb-3">
    <div class="col-lg-12">
      <a class="btn btn-sucsess" href="{{ route('categories.create') }}">create a category</a>
    </div>
  </div>
  <div class="row">
    <table class=" table table-bordered border-secondary ">
      <thead>
        <tr>
          <th>category name</th>
          <th>category slug</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category) 
          <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
              <form actions="{{route('categories.edit',$category->id)}}" method="GET">
                <button type="submit" class="btn btn-primary btn-sm">update</button>
              </form>
              
            </td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
  </div>
 
</x-layout>