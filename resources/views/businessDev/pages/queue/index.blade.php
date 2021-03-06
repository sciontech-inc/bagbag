@extends('businessDev.master.template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Queue List</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="font-size:20px">Queue Number</th>
                <th style="font-size:20px">Resident</th>
                <th style="font-size:20px">Date</th>
                <th style="font-size:20px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($queue as  $item)
              <tr>
                <td style="font-size:20px">{{$item->queue_no}}</td>
                <td style="font-size:20px">{{$item->user->firstname . ' ' . $item->user->surname}}</td>
                <td style="font-size:20px">{{$item->date}}</td>
                <td>
                  <div class="form-group" style="display:inline-flex">
                      <a class="btn btn-success btn-sm mr-1 edit queue-action" title="Done" data-toggle="modal" data-target=".add-modal" name="Done" id={{$item->id}}><i class="fa fa-check"></i></a>
                      <a class="btn btn-danger btn-sm mr-1 edit queue-action" title="Skip" data-toggle="modal" data-target=".add-modal" name="Skip" id={{$item->id}}><i class="fa fa-repeat"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>

        <table id="user-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Queue Number</th>
                <th>Resident</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                    @foreach ($queues as $key => $queue)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$queue->queue_no}}</td>
                            <td>{{$queue->user->firstname . ' ' . $queue->user->surname}}</td>
                            <td>{{$queue->date}}</td>
                            <td>{{$queue->status}}</td>
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
          <h4 class="modal-title" id="myModalLabel">Mission & Vision</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="user-form" action="{{ url('user/save') }}"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mission <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="queue" id="queue"  class="form-control col-md-7 col-xs-12"  cols="30" rows="10" maxlength="180"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Vision <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="vission" id="vission"  class="form-control col-md-7 col-xs-12"  cols="30" rows="10" maxlength="180"></textarea>
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
                url: '/queue/edit/' + this.id,
                method: 'get',
                data: {

                },
                success: function(data) {
                      var queue = data.queue;
                      $('[name=queue]').val(queue.queue);
                      $('[name=vission]').val(queue.vission);
                      $('#user-form').attr('action', 'queue/update/' + queue.id);
                }
            });
        });

        $('.queue-action').click(function(){
          if (confirm('Are you sure you want to change Status ?')) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/queue/status/' + this.id,
                                method: 'get',
                                data: {
                                    status: this.name,
                                },
                                success: function(data) {
                                    location.reload();
                                }
                            });
                    }
        })
    })
  </script>
@endsection