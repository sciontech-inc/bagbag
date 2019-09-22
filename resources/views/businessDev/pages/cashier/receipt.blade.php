@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Receipt Details </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
            <table id="receipt-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>TIN</th>
                    <th>VAT</th>
                    <th>Tax</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th class="receipt-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($receipts as $key => $receipt)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$receipt->tin}}</td>
                        <td>{{$receipt->vat}}</td>
                        <td>{{$receipt->tax}}</td>
                        <td>{{$receipt->address}}</td>
                        <td>{{$receipt->contact}}</td>
                        <td class="receipt-edit action">
                            <div class="form-group" style="display:inline-flex">
                                    <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-receipt" id={{$receipt->id}}><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                      </tr>    
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>

      <div class="modal fade add-receipt" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Receipt Details</h4>
              </div>
              <div class="modal-body">
                <div data-parsley-validate class="form-horizontal form-label-left">
                      <div class="error-message"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TIN<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="tin" name="tin" required="required" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" readonly maxlength="60">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">VAT<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="vat" name="vat" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="tax" name="tax" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                        </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="contact" name="contact" class="form-control col-md-7 col-xs-12" maxlength="180" maxlength="11">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12" maxlength="200">
                                </div>
                        </div>
                  </div>
                      <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary receipt-button">Add</button>
              </div>
            </div>
          </div>
         </div>
@endsection

@section('scripts')
  <script>
      $(function(){
    // VALIDATION DISPLAY
    function validation(data){
        if (data.success == false) {
                   
            $('.error-message').empty();
            $('.error-message').append('<div class="alert alert-danger">'+
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                        '<span aria-hidden="true">&times;</span>'+
                                        '</button>'+
                                        '<strong>Whoooppss !!</strong> There were some problem with your input. <br>'+
                                        '<div class="error-list"></div>'+
                                        '</div>')
            return $.map(data.errors, function(value, key) {
                 $('.error-list').append('<li> ' + value + '</li>');
            });
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
        $("#receipt-datatable").dataTable().fnDestroy();
        var table = $('#receipt-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/receipt/redraw',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'tin', name: 'tin' },
                { data: 'vat', name: 'vat' },
                { data: 'tax', name: 'tax' },
                { data: 'address', name: 'address' },
                { data: 'contact', name: 'contact' },
                { data: function (data, type, dataToSet) {
                    return '<td class="generic-edit action">'+
                            '<div class="form-group" style="display:inline-flex">'+
                                    '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-receipt" id='+data.id+'><i class="fa fa-edit"></i></a>'+
                            '</div>'+
                        '</td>';
                }}
            ],
                'columnDefs': [{
                'targets': [4],
                'orderable': false,            
            }]
        });
    }
    // AJAX STORE DATA
    function add() {
        $.ajax({
            url: '/receipt/save',
            method: 'get',
            data: {
                tin: $('#tin').val(),
                vat: $('#vat').val(),
                tax: $('#tax').val(),
                contact: $('#contact').val(),
                address: $('#address').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX UPDATE DATA
    function update(){
        $.ajax({
            url: '/receipt/update/' + $('#id').val(),
            method: 'get',
            data: {
                tin: $('#tin').val(),
                vat: $('#vat').val(),
                tax: $('#tax').val(),
                contact: $('#contact').val(),
                address: $('#address').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX DELETE DATA
    function delete_data(id){
        $.ajax({
            url: '/receipt/destroy/' + id,
            method: 'get',
            data: {
                receipt: $('input[name=receipt]').val(),
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
            url: '/receipt/edit/' + id,
            method: 'get',
            data: {

            },
            success: function(data) {
                $('.modal-title').text('Update receipt');
                $('.receipt-button').text('Update');

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            var name = k.replace("_", "-");
                            $('#' + name).val(v);
                        });
                    });
                $('.receipt-button').removeClass('store-data');
                $('.receipt-button').addClass('update-data');
            }
        });
    }

    var table = $('#receipt-datatable').DataTable({
            'columnDefs': [{
            'targets': [5],
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
        // randomCode('receiptCode','C');
        $('.error-message, .success-message').empty();
        $('.modal-title').text('Add receipt');
        $('.receipt-button').text('Add');
        $("input[type=text],input[type=number],input[type=email]").not("#input[name=reference]").val('');
        $('.receipt-button').removeClass('update-data');
        $('.receipt-button').addClass('store-data');
    })
    // Edit User
    $('body').on('click', '.edit', function() {
        $('.error-message, .success-message').empty();
        edit(this.id);
    });
})

  </script>
@endsection