<div class="modal modal-blur fade" id="modal-createAff" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Affiliate Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('affiliates.store')}}" method="post" class="Register-form">
        <div class="modal-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="tabs-home-7">
                  <div>
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control">

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="email" class="form-label">Eamil Address</label>
                                    <input type="email" name="email" id="email" class="form-control">

                                </div>

                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="number" class="form-label">Mobile Number</label>
                                    <input type="number" name="phone_no" id="number" class="form-control">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="text" name="password" id="Password" class="form-control">

                                </div>

                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="job_role" class="form-label">Job Role</label>
                                    <input type="text" name="job_role" id="job_role" class="form-control ">

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="status" class="form-label">Account Status</label>
                                          <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" checked="" value="1">
                                            <span class="form-check-label">Active</span>
                                          </label>
                                          <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="2">
                                            <span class="form-check-label">Paused</span>
                                          </label>
                                          <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="3">
                                            <span class="form-check-label">Rejected</span>
                                          </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="manager" class="form-label">Manager</label>
                                    <select name="manager" id="manager" class="form-select">
                                        <option value="">Select Manager</option>
                                        @foreach(App\User::get_users() as $user)
                                        <option value="{{$user->id}}">{{$user->id .' - '. $user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                        </div>

                </div>
                </div>

              </div>

        </div>

        <div class="modal-footer">
            <hr>
          <a href="{{route('affiliates')}}" class="btn btn-default link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-pink ml-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Create Account
          </button>
        </div>
    </form>
      </div>
    </div>
  </div>


