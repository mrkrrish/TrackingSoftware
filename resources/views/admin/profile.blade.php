@component('components.admin-master')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="page-title">
            Administrator Profile
          </h2>
 <div class="text-muted mt-1"> Profile ID: {{Auth::User()->id}}</div>

        </div>
        <!-- Page title actions -->

        <div class="col-auto ml-auto d-print-none">
          <div class="d-flex">
            <a href="{{route('admin.index')}}" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
              Return to Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>

<div class="row justify-content-between">
    @if(session()->has('view-message'))
    <div id="alertmessage" class="alert alert-success alert-dismissible">
        {{ session('view-message') }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @endif
 <div class="col-md-6 card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
          <li class="nav-item">
            <a href="#tabs-home-13" class="nav-link active" data-bs-toggle="tab">Basic Details</a>
          </li>
        </ul>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active show" id="tabs-home-13">
                <form action="{{route('admin.edit')}}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::User()->id}}">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            {{__('is-invalid')}}
                        @enderror" id="name" value="{{Auth::User()->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email')
                        {{__('is-invalid')}}
                    @enderror" id="email"  value="{{Auth::User()->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="phone_no" class="form-label">Mobile</label>
                        <input type="number" name="phone_no" class="form-control @error('phone_no')
                        {{__('is-invalid')}}
                    @enderror" id="phone_no" value="{{Auth::User()->phone_no}}">
                        @error('phone_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="job_role" class="form-label">Job Role</label>
                        <input type="text" name="job_role" class="form-control @error('job_role')
                        {{__('is-invalid')}}
                    @enderror" id="job_role" value="{{Auth::User()->job_role}}">
                        @error('job_role')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address')
                        {{__('is-invalid')}}
                    @enderror" id="address" value="{{Auth::User()->address}}">
                        @error('address')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-lg-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control @error('city')
                        {{__('is-invalid')}}
                    @enderror" id="city" value="{{Auth::User()->city}}">
                        @error('city')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" class="form-control @error('state')
                        {{__('is-invalid')}}
                    @enderror" id="state" value="{{Auth::User()->state}}">
                        @error('state')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-lg-6">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control @error('postal_code')
                        {{__('is-invalid')}}
                    @enderror" id="postal_code" value="{{Auth::User()->postal_code}}">
                        @error('postal_code')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="country" class="form-label">Country</label>
                        <select name="country" id="country" class="form-select select2">
                            <option value="" readonly>Select Country</option>
                            @foreach(config('world.countries') as $country)
                            <option value="{{$country['code']}}" {{ Auth::User()->country == $country['code'] ? 'selected' : '' }}>{{ $country['code'] .' - '. $country['name']}}</option>
                            @endforeach
                        </select>


                    </div>
                    @if (Auth::User()->role !== 'Admin')
                    <div class="col-lg-6">
                        <label for="manager" class="form-label">Manager</label>
                        <select name="manager" id="manager" class="form-select">
                            <option value="">Select Manager</option>
                            @foreach(App\User::get_users() as $user)
                            <option value="{{Auth::User()->manager}}" {{Auth::User()->manager == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                </div>
                <div class="row border-bottom mb-3">
                    @if (Auth::User()->role !== 'Admin')
                    <div class="col-lg-6">

                        <div class="form-group ">
                            <label for="status" class="form-label mb-2">Account Status</label>
                            @foreach(config('services.account_status') as $account_status => $name)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" {{ Auth::User()->status == $account_status ? 'checked' : '' }} value="{{$account_status}}">
                                <span class="form-check-label">{{$name}}</span>
                              </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary btn-md">Update Profile</button>
                </form>
            </div>

          </div>
        </div>
      </div>

<div class="col-md-5 card">
    <ul class="nav nav-tabs" data-bs-toggle="tabs">
        <li class="nav-item">
          <a href="#tabs-home-14" class="nav-link active" data-bs-toggle="tab">Change Password</a>
        </li>
        <li class="nav-item ml-auto">
            <form action="{{route('admin.reset_password')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{Auth::User()->id}}">
                <button type="submit" class="btn btn-outline-yellow btn-sm" >Reset Password</button>
            </form>
        </li>
      </ul>
    <div class="card-body">
    <div class="tab-content">
        <div class="tab-pane active show" id="tabs-home-13">
            <form action="{{route('admin.change_password')}}" method="post" class="form">
                @csrf
                    <div class="col-lg-12 mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control @error('password')
                        {{__('is-invalid')}}
                    @enderror" id="password" placeholder="New Password" autocomplete="off">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control @error('confirm_password')
                        {{__('is-invalid')}}
                    @enderror" id="confirm-password" autocomplete="off">
                    @error('confirm_password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <br>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-md">Change Password</button>
                    </div>
                    <hr>
            </form>
        </div>

        </div>
    </div>

</div>
</div>
<div class="row row-cards border-top mt-3">
   <!-- Page title -->
   <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title mt-2 py-3">
         Global Postback
        </h2>

      </div>
      <!-- Page title actions -->
      <div class="col-md-12 card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
            <li class="nav-item">
              <a href="#tabs-home-15 p-2" class="nav-link active" data-bs-toggle="tab">Global Postback URL</a>
            </li>
          </ul>
        <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tabs-home-15">
                <label for="global_postback" class="form-label">Server-to-server Postback</label>
                <input type="text" name="global_postback" class="form-control mb-3" id="global_postback" placeholder="Global Postback" value="{{Auth::User()->global_postback}}" autocomplete="off" readonly>
                <label for="global_pixel" class="form-label">Global Image Pixel</label>
                <input type="text" name="global_pixel" class="form-control mb-3" id="global_pixel" placeholder="Global Postback" value="{{Auth::User()->global_pixel}}" autocomplete="off" readonly>
                <label for="global_pixel" class="form-label">Global Iframe Pixel</label>
                <input type="text" name="global_pixel" class="form-control mb-3" id="global_iframe" placeholder="Global Postback" value="{{Auth::User()->global_iframe}}" autocomplete="off" readonly>

            </div>
          <p class="text-muted my-3">Available Parameters</p>
          <div class="row">
            @foreach (config('services.postback_parameters') as $parameter_name =>$parameter_key )

            <div class="col-md-3">
                <label class="form-check form-switch">
                    <input class="form-check-input" id="{{$parameter_name}}" type="checkbox" {{$parameter_name == 'uuid' ? 'checked'.' '.'disabled' : ''}} onchange="cl_change();">
                    <span class="form-check-label">{{$parameter_name}}</span>
                  </label>
              </div>
            @endforeach
          </div>

            </div>
        </div>

    </div>

    </div>
  </div>

</div>

</div>
@endsection

@section('script')
<script>

function cl_change() {
      var c_postback = '{{Auth::user()->global_postback}}';
      var c_pixel = '{{Auth::user()->global_pixel}}';
      var c_iframe = '{{Auth::user()->global_iframe}}';

var pbs2s = c_postback+"?";
var pbimg = c_pixel+"?cl=i";
var pbifrm = c_iframe+"?cl=f";

@foreach(config('services.postback_parameters') as $parameter_name =>$parameter_key)
var {{$parameter_name}} = $("{{'#'.$parameter_name}}").prop('checked');
    if({{$parameter_name}} === true) {
      var pbs2s = pbs2s+"&{{$parameter_name}}={{{__('{').$parameter_name.__('}')}}}";
      var pbimg = pbimg+"&{{$parameter_name}}={{{__('{').$parameter_name.__('}')}}}";
      var pbifrm = pbifrm+"&{{$parameter_name}}={{{__('{').$parameter_name.__('}')}}}";
    }
@endforeach
        $("#global_postback").val(pbs2s+'');
        $("#global_pixel").val("<img src='"+pbimg+"' height='0' width='0' />");
        $("#global_iframe").val("<iframe src='"+pbifrm+"' height='0' width='0' ></iframe>");

    }cl_change();
    </script>
@endsection
@endcomponent
