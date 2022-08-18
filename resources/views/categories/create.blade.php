<x-layout>
<form action="{{ route('categories.store') }}" method="post">
@csrf
<div class="row">
<div class="col-6 form-group">
<strong>Category name :</strong>
 <input type="text" class="form-control" name="name">
 @error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $massage }}</div>
 @enderror
</div>

<div class="col-6 ">
    <strong>Category slug :</strong>
     <input type="text" class="form-control" name="slug">
     @error('slug')
<div class="alert alert-danger mt-1 mb-1">{{ $massage }}</div>
 @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary btn-xs MT-5">submit</button>
</form>

</x-layout>