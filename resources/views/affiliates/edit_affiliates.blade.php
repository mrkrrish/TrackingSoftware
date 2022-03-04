@component('components.admin-master')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="page-title">
            Affiliate Profile
          </h2>
 <div class="text-muted mt-1"> Profile ID: {{$affiliate->id}}</div>

        </div>
        <!-- Page title actions -->

        <div class="col-auto ml-auto d-print-none">
          <div class="d-flex">
            <a href="{{route('affiliates')}}" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
              Return to List
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
                <form action="{{route('affiliate.edit')}}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$affiliate->id}}">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            {{__('is-invalid')}}
                        @enderror" id="name" value="{{$affiliate->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email')
                        {{__('is-invalid')}}
                    @enderror" id="email"  value="{{$affiliate->email}}">
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
                    @enderror" id="phone_no" value="{{$affiliate->phone_no}}">
                        @error('phone_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="job_role" class="form-label">Job Role</label>
                        <input type="text" name="job_role" class="form-control @error('job_role')
                        {{__('is-invalid')}}
                    @enderror" id="job_role" value="{{$affiliate->job_role}}">
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
                    @enderror" id="address" value="{{$affiliate->address}}">
                        @error('address')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-lg-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control @error('city')
                        {{__('is-invalid')}}
                    @enderror" id="city" value="{{$affiliate->city}}">
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
                    @enderror" id="state" value="{{$affiliate->state}}">
                        @error('state')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-lg-6">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control @error('postal_code')
                        {{__('is-invalid')}}
                    @enderror" id="postal_code" value="{{$affiliate->postal_code}}">
                        @error('postal_code')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <label for="country" class="form-label">Country</label>
                        <select name="country" id="select-with-flags" class="form-select">
                            <option value="" readonly>Select Country</option>
                            @foreach(config('country.countries') as $country)
                            <option value="{{ $country['iso2'] }}" data-data='{"flag": "{{Str::lower($country['iso2'])}}"}' {{ Auth::User()->country == $country['iso2'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="manager" class="form-label">Manager</label>
                        <select name="manager" id="manager" class="form-select">
                            <option value="">Select Manager</option>
                            @foreach(App\User::get_users() as $user)
                            <option value="{{$affiliate->manager}}" {{$affiliate->manager == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row border-bottom mb-3">
                    <div class="col-lg-6">

                        <div class="form-group ">
                            <label for="status" class="form-label mb-2">Account Status</label>
                            @foreach(config('services.account_status') as $account_status => $name)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" {{ $affiliate->status == $account_status ? 'checked' : '' }} value="{{$account_status}}">
                                <span class="form-check-label">{{$name}}</span>
                              </label>
                            @endforeach
                        </div>
                    </div>
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
            <form action="{{route('affiliate.reset_password')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$affiliate->id}}">
                <button type="submit" class="btn btn-outline-yellow btn-sm" >Reset Password</button>
            </form>
        </li>
      </ul>
<div class="card-body">
    <div class="tab-content">
        <div class="tab-pane active show" id="tabs-home-13">
            <form action="{{route('affiliate.change_password')}}" method="post" class="form">
                @csrf
                <input type="hidden" name="id" value="{{$affiliate->id}}" class="form-control">
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

</div>
@endsection
@endcomponent
