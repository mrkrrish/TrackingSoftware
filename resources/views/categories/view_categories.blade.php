@component('components.admin-master')

@section('content')
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="page-title">
              Categories
            </h2>
          </div>
        </div>
      </div>
      <div class="row">

        @if(Route::currentRouteName() == 'category.edit')
        @include('categories.edit_categories')
        @else
        <div class="col-lg-4">
            <h3 class="mb-3">Add New Category</h3>
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
                    <form action="{{route('category.create')}}" method="post" class="form-group">
                    @csrf
                    <div class="col-md-12 p-3">
                    <label for="category_name" class="form-label ">Category Name</label>
                    <input type="text" id="category_name" name="category_name" class="form-control @error('category_name'){{'is-invalid'}}@enderror">
                    @error('category_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        @endif

        <div class="col-lg-8">
            @if (session()->has('view-message'))
                <div id="alertmessage" class="alert alert-success alert-dismissible" role="alert">
                    {{session('view-message')}}
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
          <div class="card">
            <div class="list-group card-list-group">
                <div class="list-group-item">
                    <div class="row g-2 align-items-center">
                      <div class="col-auto text-h3">
                        <strong>{{__('ID')}}</strong>
                      </div>
                      <div class="col">
                          <strong>{{__('Category Name')}}</strong>


                      </div>
                      <div class="col-auto text-muted">
                        <strong>{{__('Created at / Action')}}</strong>
                      </div>


                    </div>
                  </div>
                @foreach ($categories as $category )
                <div class="list-group-item">
                    <div class="row g-2 align-items-center">
                      <div class="col-auto text-h3">
                        {{$category->category_id}}
                      </div>
                      <div class="col">
                        {{$category->category_name}}

                      </div>
                      <div class="col-auto text-muted">
                        {{$category->created_at->diffForHumans()}}
                      </div>
                      @if ($category->category_id === 1 || $category->category_id === 2 )

                      @else
                      <div class="col-auto lh-1">
                        <div class="dropdown">
                          <a href="#" class="link-secondary" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="5" cy="12" r="1"></circle><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle></svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{route('category.edit', $category->category_id)}}" class="dropdown-item">Update</a>
                           <form action="{{route('category.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="{{$category->category_id}}">
                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you Sure!');">{{__('Delete')}}</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      @endif

                    </div>
                  </div>
                @endforeach



            </div>
          </div>
        </div>

      </div>
    </div>

@endsection

@endcomponent
