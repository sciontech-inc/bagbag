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
      <h2><i class="fa fa-align-left"></i> School</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <button type="button" class="btn btn-primary pull-right addGeneric" data-toggle="modal" data-target=".add-modal">Add School</button>
        <table id="user-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>School Name</th>
                <th>Address</th>
                <th>Level</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($schools as $key => $school)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$school->name}}</td>
                        <td>{{$school->address}}</td>
                        <td>{{$school->level}}</td>
                        <td>{{$school->contact}}</td>
                        <td>
                            <div class="form-group" style="display:inline-flex">
                                    <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-modal" id={{$school->id}}><i class="fa fa-edit"></i></a>
                                    <form class="form-horizontal" method="get" action="{{ url('school/destroy/'. $school->id)}}">
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
<div class="modal fade add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">School</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="modal-form" action="{{ url('school/save') }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">School Name<span class="required"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" maxlength="180">
                                </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level<span class="required"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="level" id="level" class="form-control col-md-7 col-xs-12" maxlength="60">
                                    <option selected disabled>Choose Level</option>
                                    <option value="Pre-school">Pre-school</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="College">College</option>
                                    <option value="Graduate">Graduate</option>
                                </select>
                            </div>
                          </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
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
        url: '/school/edit/' + id,
        method: 'get',
        data: {

        },
        success: function(data) {
            $('.modal-title').text('Update School');
            $('.user-button').text('Update');

                $.each(data, function() {
                    $.each(this, function(k, v) {
                        if(k != 'image'){
                           $('#'+k).val(v);
                        }
                    });
                });
            $('#modal-form').attr('action', 'school/update/' + data.schools.id);
        }
    });
}

$(document).ready(function(){
    //logo image preview 
        $('#user-datatable').DataTable();
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