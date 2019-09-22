@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Position </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
              <button type="button" class="btn btn-primary pull-right add generic-edit action" data-toggle="modal" data-target=".add-position">Add Position</button>
            <table id="position-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th class="generic-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($positions as $key => $position)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$position->position}}</td>
                        <td class="generic-edit action">
                            <div class="form-group" style="display:inline-flex">
                              <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-position" id={{$position->id}}><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm delete-data" id={{$position->id}} title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                      </tr>    
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>

      <div class="modal fade add-position" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Position</h4>
              </div>
              <div class="modal-body">
                      <div class="error-message"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Position</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" >
                          <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                        </div>
                        <br>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary position-button">Add</button>
              </div>
            </div>
          </div>
         </div>
@endsection

@section('scripts')
  <script>
            $(function(){
            // DISPLAY VALIDATION
            function validation(data) {
                if (data.success == false) {
                    $('.error-message').empty();
                    $('.error-message').append('<div class="alert alert-danger">'+
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                '<span aria-hidden="true">&times;</span>'+
                                            '</button>'+
                                            '<strong>Whoooppss !!</strong> There were some problem with your input. <br>'+
                                            '<ul>'+data.errors.position[0]+'</ul>'+
                                            '</div>')
                } else {
                    $('.success-message').empty();
                    $('.success-message').append('<div class="alert alert-success">'+
                                                '<p>'+data[0]+'</p>'+
                                                '</div>')
                    datatable_draw();
                    $('.modal').modal('toggle');
                }
            }
            // REFRESH DATATABLE WITHOUT LOADING THE PAGE
            function datatable_draw() {
                $("#position-datatable").dataTable().fnDestroy();
                var table = $('#position-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/position/redraw',
                    columns: [
                        { data: 'position', name: 'position' },
                        { data: 'position', name: 'position' },
                        { data: function (data, type, dataToSet) {
                            return '<td class="generic-edit action">'+
                                    '<div class="form-group" style="display:inline-flex">'+
                                            '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-position" id='+data.id+'><i class="fa fa-edit"></i></a>'+
                                            '<a class="btn btn-danger btn-sm delete-data" id='+data.id+' title="Delete"><i class="fa fa-trash"></i></a>'+
                                    '</div>'+
                                '</td>';
                        }}
                    ],
                    'columnDefs': [{
                        'targets': [2],
                        'orderable': false,            
                    }]
                });
                table.on( 'order.dt search.dt', function () {
                    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
                }).draw();
            }
            // AJAX STORE DATA
            function add() {
                $.ajax({
                    url: '/position/save',
                    method: 'get',
                    data: {
                        position: $('input[name=position]').val(),
                    },
                    success: function (data) {
                        validation(data);
                    }
                });
            }
            // AJAX UPDATE DATA
            function update(){
                $.ajax({
                    url: '/position/update/' + $('#id').val(),
                    method: 'get',
                    data: {
                        position: $('input[name=position]').val(),
                    },
                    success: function (data) {
                        validation(data);
                    }
                });
            }
            // AJAX DELETE DATA
            function delete_data(id){
                $.ajax({
                    url: '/position/destroy/' + id,
                    method: 'get',
                    data: {
                        position: $('input[name=position]').val(),
                    },
                    success: function (data) {
                            $('.success-message').empty();
                            $('.success-message').append('<div class="alert alert-success">'+
                                                        '<p>' + data[0] + '</p>'+
                                                        '</div>')
                            datatable_draw();
                    }
                });
            }
            // CLICKING THE EDIT BUTTON
            function edit(id) {
                $.ajax({
                    url: '/position/edit/' + id,
                    method: 'get',
                    data: {

                    },
                    success: function(data) {
                        $('.modal-title').text('Update Position');
                        $('.position-button').text('Update');

                            $.each(data, function() {
                                $.each(this, function(k, v) {
                                    $('#' + k).val(v);
                                });
                            });
                        $('.position-button').removeClass('store-data');
                        $('.position-button').addClass('update-data');
                    }
                });
            }

            var table = $('#position-datatable').DataTable({
                    'columnDefs': [{
                    'targets': [2],
                    'orderable': false,            
                }]
            });
        
            $('body').on('click', '.store-data', function() {
                add();
            });

            $('body').on('click', '.delete-data', function() {
                var r = confirm("Are you sure you want to delete?");
                if (r == true) {
                    delete_data(this.id);
                }
            });

            $('body').on('click', '.update-data', function() {
                update();
            });

            // CLICKING THE ADD USER
            $('.add').click(function() {
                $('.error-message, .success-message').empty();
                $('.modal-title').text('Add Position');
                $('.position-button').text('Add');
                $('input[name=position]').val('');
                $('.position-button').removeClass('update-data');
                $('.position-button').addClass('store-data');
            })
            // Edit User
            $('body').on('click', '.edit', function() {
                $('.error-message, .success-message').empty();
                edit(this.id);
            });
        })

  </script>
@endsection