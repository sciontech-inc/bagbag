@extends('businessDev.master.template')
@section('links')
 <style>
     img {
        width: 100px !important;
    }
 </style>   
@endsection
@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> kagawads</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <button type="button" class="btn btn-primary pull-right addGeneric" data-toggle="modal" data-target=".add-modal">Add Event</button>
        <table id="kagawad-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>
                <th>About</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Picture</th>
                <th class="kagawad-edit action">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kagawads as $key => $kagawad)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$kagawad->firstname . ' ' . $kagawad->middlename . ' ' . $kagawad->surname}}</td>
                    <td>{{$kagawad->position}}</td>
                    <td>{{$kagawad->about}}</td>
                    <td>{{$kagawad->address}}</td>
                    <td>{{$kagawad->contact}}</td>
                    <td width="30px"><img  style="width:100% !important" src="{{asset('images/'.$kagawad->image)}}" alt=""></td>
                    <td class="kagawad-edit action">
                        <div class="form-group" style="display:inline-flex">
                                <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-kagawad" id={{$kagawad->id}}><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm delete-data" id={{$kagawad->id}} title="Delete"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                  </tr>    
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
<div class="modal fade add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Event</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="modal-form" action="{{ url('kagawad/save') }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name<span class="required"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="middlename" name="middlename" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="surname" name="surname" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Position<span class="required"></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="position" id="position" class="form-control col-md-7 col-xs-12">
                                      <option disabled selected>Choose Position</option>
                                      @foreach ($positions as $position)
                                          <option value="{{$position->id}}">{{$position->position}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">About<span class="required"></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="about" name="about" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required"></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact<span class="required"></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;">
                              </div>
                          </div>
                          <div class="form-group ">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Picture<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary user-button">Add</button>
        </form>
        </div>
      </div>
    </div>
   </div>
@endsection

@section('scripts')
  <script>
function edit(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/event/edit/' + id,
        method: 'get',
        data: {

        },
        success: function(data) {
            $('.modal-title').text('Update Event');
            $('.user-button').text('Update');

                $.each(data, function() {
                    $.each(this, function(k, v) {
                        if(k != 'image'){
                           $('#'+k).val(v);
                        }
                    });
                });
            $('#modal-form').attr('action', 'event/update/' + data.kagawads.id);
        }
    });
}

$(document).ready(function(){
    //logo image preview 

    
        $('#kagawad-datatable').DataTable();
    // Add User
        $('.addUser').click(function(){
            $('.modal-title').text('Add Group');
            $('.user-button').text('Add');
        })
    // Edit User
        $('.edit').click(function() {
            edit(this.id);
        });
})
  </script>
@endsection