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
      <h2><i class="fa fa-align-left"></i> Items</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <button type="button" class="btn btn-primary pull-right addGeneric" data-toggle="modal" data-target=".add-modal">Add Item</button>
        <table id="user-datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Item</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$item->item}}</td>
                        <td>{{$item->amount}}</td>
                        <td>
                            <div class="form-group" style="display:inline-flex">
                                    <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-modal" id={{$item->id}}><i class="fa fa-edit"></i></a>
                                    <form class="form-horizontal" method="get" action="{{ url('item/destroy/'. $item->id)}}">
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
          <h4 class="modal-title" id="myModalLabel">Item</h4>
        </div>
        <div class="modal-body">
                <form method="POST" id="modal-form" action="{{ url('item/save') }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Item<span class="required"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="item" name="item" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
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
        url: '/item/edit/' + id,
        method: 'get',
        data: {

        },
        success: function(data) {
            $('.modal-title').text('Update Item');
            $('.user-button').text('Update');

                $.each(data, function() {
                    $.each(this, function(k, v) {
                        if(k != 'image'){
                           $('#'+k).val(v);
                        }
                    });
                });
            $('#modal-form').attr('action', 'item/update/' + data.items.id);
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