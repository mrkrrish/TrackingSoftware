@component('components.admin-master')

@section('content')
<div class="page-header text-white d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Offers
                </div>
                <h2 class="page-title text-dark">
                  Create New
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ml-auto d-print-none">
                <div class="btn-list">
<!--                  <span class="d-none d-sm-inline">-->
<!--                    <a href="#" class="btn btn-dark">-->

<!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg> Advanced Mode-->
<!--                    </a>-->
<!--                  </span>-->

                </div>
              </div>
            </div>
          </div>
          <div class="row">
             <div class="col-md-12">
              <div class="card">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                  <li class="nav-item">
                    <a href="#offer-create" class="nav-link active" data-bs-toggle="tab">Basic Details </a>
                  </li>
                </ul>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane show active" id="offer-create">
                      <div>
<form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3 ">
          <label class="form-label">Offer name</label>
          <div>
            <input type="text" class="form-control" placeholder="Enter Name" name="offername">
            <small class="form-hint"></small>
          </div>
        </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="form-group mb-3 ">
          <label class="form-label">Offer Logo</label>
          <div>
            <input type="file" class="form-control" placeholder="Select Logo" name="OfferLogo">
            <small class="form-hint"></small>
          </div>
        </div>
            </div>
        </div>
          <div class="row mb-3">
              <div class="col-md-3">
                  <div class="form-group mb-3 ">
                 <label class="form-label">Offer Currency</label>
            <select class="form-select" id="select-with-flags">
              <option value="" readonly><b>Select Currency</b></option>
              @foreach (config('country.countries') as $currency)
              <option value="{{ $currency['currency'] }}" data-data='{"flag": "{{Str::lower($currency['iso2'])}}"}'>{{ $currency['currency_name'] }}</option>
              @endforeach
              </select>
            <small class="form-hint"></small>
        </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group mb-3 ">
          <label class="form-label">Advertiser Profile</label>
          <div>
              <select class="form-select selectized">
              <option value="">Select Advertiser Profile</option>
                    @foreach (Offers::getAdvertiserList()->advertisers as $advertiser)
                    <option value="{{$advertiser->id}}">{{$advertiser->name}}</option>
                    @endforeach
              </select>

            <small class="form-hint"></small>
          </div>
        </div>
              </div>
            <div class="col-md-4">
               <div class="form-group mb-3 ">
          <label class="form-label">Categories</label>
          <div>
        <select name="tags" id="select-tags" class="form-select" multiple>
            @foreach (Categories::getCategoriesList() as $category)
            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
         </select>
            <small class="form-hint"></small>
          </div>
        </div>
          </div>
          </div>
      <div class="row mb-4">
          <div class="col-md-4">
    <div class="form-group mb-2">
        <label class="fomr-label">Start Date</label>
    </div>
    <div class="input-icon">
    <input id="calendar-start" type="text" value="" class="form-control flatpickr-input" placeholder="Select a date">
    <span class="input-icon-addon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
    </span>
  </div>
          </div>
      <div class="col-md-4">
    <div class="form-group mb-2">
        <label class="fomr-label">End Date</label>
    </div>
    <div class="input-icon">
    <input id="calendar-end" type="text" value="" class="form-control flatpickr-input" placeholder="Select a date">
    <span class="input-icon-addon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
    </span>
  </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <div class="mb-3">
  <div class="form-label">Offer Access</div>
  <div>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_access" checked>
      <span class="form-check-label">Open</span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_access">
      <span class="form-check-label">On-Request</span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_access">
      <span class="form-check-label">Private</span>
    </label>
  </div>
</div>
    </div>
<div class="col-md-4">
     <div class="mb-3">
  <div class="form-label">Offer Status</div>
  <div>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_status" checked>
      <span class="form-check-label">Live</span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_status">
      <span class="form-check-label">Paused</span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="offer_status">
      <span class="form-check-label">Ended</span>
    </label>
  </div>
</div>
</div>
</div>


      </div>
    <div class="row mb-3">
          <div class="form-group mb-3">
        <label class="fomr-label">Preview Link</label>
    </div>
        <div class="col-lg-12">
            <input type="url" class="form-control" name="preview_link">
        </div>
    </div>

       <div class="row mt-3">
          <div class="form-group mb-3">
        <label class="fomr-label">Destination Link</label>
    </div>
        <div class="col-lg-12">
            <textarea class="form-control" name="offer_url" id="offer_url"></textarea>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="form-label bg-light mb-4"><h1 class="p-2">Your Parameters</h1></label>
        <div class="row">
            @foreach(config('services.parameters') as $parameter => $value)
            <div class="col-md-2">
                <label class="form-check form-switch">
                    <input type="checkbox" name="parameters" class="form-check-input" id="{{$parameter}}" onchange="url_change();">
                    <span class="form-check-label">{{$value}}</span>
                    </label>
            </div>

            @endforeach
        </div>
        </div>
      <hr>
      <div class="row">
          <div class="col-md-12">
                <div class="form-group mb-2">
        <label class="fomr-label">Offer Description &amp; Terms/KPI</label>
    </div>
              <textarea id="offer_terms" class="form-control h-100" name="offer_terms">

              </textarea>
          </div>
      </div>



        <div class="form-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

@section('script')

  <script src="https://cdn.tiny.cloud/1/g3bjjl50tzofjyeebmjhnc7025763vsql5szo11qol33x6y5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
tinymce.init({
  selector: 'textarea#offer_terms',
  height: 250,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen table',
    'insertdatetime media table paste code wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | table bullist numlist outdent indent | ' +
  'removeformat ',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

  </script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('calendar-start'), {
  	});
  });
    document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('calendar-end'), {
  	});
  });
</script>

<script>
$('#offer_url').on('change', function(e) {
e.preventDefault();
var local_url = $('#offer_url').val();
if(local_url == null) {
    localStorage.setItem('destination_link', ' ');
}
localStorage.setItem('destination_link', local_url);
});

function url_change() {
var offerurl= localStorage.getItem('destination_link');
@foreach(config('services.parameters') as $parameter => $value)

var {{$parameter}} = $("{{'#'.$parameter}}").prop('checked');

if({{$parameter}} === true)
{
var offerurl = offerurl + "{{$value}}";
}

@endforeach
$('#offer_url').val(offerurl+'');
}url_change();
</script>
@endsection
@endsection

@endcomponent
