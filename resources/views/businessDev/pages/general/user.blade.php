@extends('businessDev.master.template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Users <small>Create User</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <button type="button" class="btn btn-primary pull-right addUser" data-toggle="modal" data-target=".add-user">Create User</button>
        <table id="user-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>
              @foreach ($users as $user)
                  <tr>
                    <td>{{$user->firstname . ' ' . $user->middlename . ' ' . $user->surname}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="form-group" style="display:inline-flex">
                                <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-user" id={{$user->id}}><i class="fa fa-edit"></i></a>
                                <form class="form-horizontal" method="get" action="{{ url('user/destroy/'. $user->id)}}">
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                        </div>
                    </td>
                  </tr>    
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
<div class="modal fade add-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Add User</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="user-form" action="{{ url('user/save') }}"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="firstname" required="required" class="form-control col-md-7 col-xs-12" name="firstname" required autofocus maxlength="60">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Middle Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="middlename" required="required" class="form-control col-md-7 col-xs-12" name="middlename" required autofocus maxlength="60">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="surname" required="required" class="form-control col-md-7 col-xs-12" name="surname" required autofocus maxlength="60">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="60">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group password">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="password" id="password" class="form-control col-md-7 col-xs-12  @error('password') is-invalid @enderror" name="password" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Role <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="role" id="role" required="required" class="form-control col-md-7 col-xs-12">
                                      <option disabled selected>Choose Role</option>
                                      <option value="Admin">Admin</option>
                                      <option value="Cashier">Cashier</option>
                                  </select>
                                </div>
                        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary user-button">Create User</button>
        </form>
        </div>
      </div>
    </div>
   </div>
@endsection

@section('scripts')
  <script src="{{ asset('/js/user.js') }}"></script>
@endsection