@extends('businessDev.master.template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Mission and Vision</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <table id="user-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Mission</th>
                <th>Vision</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>
                  <tr>
                    <td>{{$mission->mission}}</td>
                    <td>{{$mission->vission}}</td>
                    <td>
                        <div class="form-group" style="display:inline-flex">
                                <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-user" id={{$mission->id}}><i class="fa fa-edit"></i></a>
                        </div>
                    </td>
                  </tr>    
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
          <h4 class="modal-title" id="myModalLabel">Mission & Vision</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="user-form" action="{{ url('user/save') }}"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mission <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="mission" id="mission"  class="form-control col-md-7 col-xs-12"  cols="30" rows="10" maxlength="200"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Vision <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="vission" id="vission"  class="form-control col-md-7 col-xs-12"  cols="30" rows="10" maxlength="200"></textarea>
                            </div>
                        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary user-button">Update</button>
        </form>
        </div>
      </div>
    </div>
   </div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
            $('#user-datatable').DataTable();
     
            $('.edit').click(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/mission/edit/' + this.id,
                method: 'get',
                data: {

                },
                success: function(data) {
                      var mission = data.mission;
                      $('[name=mission]').val(mission.mission);
                      $('[name=vission]').val(mission.vission);
                      $('#user-form').attr('action', 'mission/update/' + mission.id);
                }
            });
        });
    })
  </script>
@endsection