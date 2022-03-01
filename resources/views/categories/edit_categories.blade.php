<div class="col-lg-4">
    <h3 class="mb-3">Edit Category</h3>
    <div class="row row-cards">

      <div class="col-md-6 col-lg-12">
        @if (session()->has('message'))
        <div id="alertmessage" class="alert alert-success alert-dismissible">
            {{session('message')}}
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
        <div class="card">
          <div class="row">
            <form action="{{route('category.update', $category->category_id)}}" method="post" class="form-group">
            @csrf
            <input type="hidden" name="category_id" value="{{$category->category_id}}">
            <div class="col-md-12 p-3">
            <label for="category_name" class="form-label ">Category Name</label>
            <input type="text" id="category_name" value="{{$category->category_name}}" name="category_name" class="form-control @error('category_name'){{'is-invalid'}}@enderror">
            @error('category_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Update Category</button>
            <a href="{{route('categories')}}" class="btn btn-default btn-sm">Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
