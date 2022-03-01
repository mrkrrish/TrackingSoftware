@component('components.admin-master')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="page-title">
            Advertisers
          </h2>
          <div class="text-muted mt-1">Showing {{$advertisers->count().' out of total '. $advertisers->total().' Advertisers'}}</div>
        </div>
        <!-- Page title actions -->

        <div class="col-auto ml-auto d-print-none">
          <div class="d-flex">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-createAff">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              New Advertiser
            </a>
          </div>
        </div>
      </div>
    </div>

    @if($errors->isEmpty())

    @elseif($errors->any())
    @foreach($errors->all() as $error)
    <div id="alertmessage" class="alert alert-warning alert-dismissible">
        {{ $error }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @endforeach
    @endif
    @if(session()->has('view-message'))
    <div id="alertmessage" class="alert alert-success alert-dismissible">
        {{ session('view-message') }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @endif
    <div class="row row-cards">
       @foreach ($advertisers as $advertiser)
       <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="row g-2 align-items-center">
              <div class="col-auto">
                <span class="avatar">{{Str::limit($advertiser->name, 2, '')}}</span>
              </div>
              <div class="col">
                <h3 class="mb-0"><a href="{{route('advertiser.profile', $advertiser->id)}}">{{$advertiser->name}}</a></h3>
                <div class="text-muted text-h5">{{$advertiser->job_role}}</div>
              </div>

              <div class="col-auto lh-1 align-self-start">

                  @if($advertiser->status === '1')
                <span class="badge bg-green-lt">
                  {{__('Active')}}
                </span>
                   @elseif($advertiser->status === '2')
                   <span class="badge bg-yellow-lt">
                    {{__('Paused')}}
                  </span>
                  @elseif($advertiser->status === '3')
                   <span class="badge bg-red-lt">
                    {{__('Rejected')}}
                  </span>
                @else
                <span class="badge bg-grey-lt">
                 {{__('Undefined')}}
               </span>
                @endif
              </div>
            </div>
            <div class="row align-items-center mt-4">

              <div class="col-auto">
                <div class="btn-list">
                  <a href="#" class="btn btn-outline-success btn-sm">
                    {{__('Login')}}
                  </a>
                  <a href="{{route('advertiser.profile', $advertiser->id)}}" class="btn btn-outline-secondary btn-sm">
                    Profile
                  </a>
                  <form action="{{route('advertiser.delete')}}" method="post">

                    @csrf
                    <input type="hidden" name="id" value="{{$advertiser->id}}">
                      <button type="submit" class="btn btn-outline-danger btn-sm">
                         Delete
                    </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

       @endforeach


    </div>
    <div class="pagination justify-content-center align-items-center">

    </div>
    <div class="d-flex mt-4">
        <ul class="pagination ml-auto">
            {{$advertisers->setPageName('p')}}

        </ul>
      </div>


  </div>

  @include('advertisers.create')

  @endsection
@endcomponent
