@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Cashier </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
              <button type="button" class="btn btn-warning pull-right print"> Print Receipt </button>
              <button type="button" class="btn btn-primary pull-right add cashier-edit action" data-toggle="modal" data-target=".add-cashier"> Add Item </button> <br><br>
              <div class="cashier-form">
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Resident<span class="required"></label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="resident" name="resident" required="required" class="form-control col-md-7 col-xs-12" maxlength="60">
                    </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">TIN<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="tin" name="tin" required="required" class="form-control" value="{{$receipt->tin}}" disabled maxlength="60">
                    <input type="hidden" id="record-id" name="record-id" required="required" class="form-control" value="{{$receipt->tin}}" disabled>
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">Discount<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="discount" name="dicount" required="required" class="form-control col-md-7 col-xs-12" style="margin-bottom: 17px" value="0" maxlength="60">
                  </div>
                 </div>
                 <br>

                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">Sub Total<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="sub_total" name="sub_total" required="required" value="0" class="form-control col-md-7 col-xs-12" disabled maxlength="60">
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">Total<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="total-amount" name="total-amount" required="required" value="0" class="form-control col-md-7 col-xs-12" style="margin-bottom: 10px" disabled maxlength="60">
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">Cash<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="pay-amount" name="pay-amount" class="form-control" required="required" style="margin-bottom: 17px" value="0" maxlength="60">
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12">Change<span class="required"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="change" name="change" required="required" class="form-control"  value="0" style="margin-bottom: 15px" disabled maxlength="60">
                  </div>
                 </div>
                 <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Receipt No<span class="required"></label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="receipt-no" name="receipt-no" required="required" class="form-control col-md-7 col-xs-12" style="margin-bottom: 15px" disabled maxlength="60">
                    </div>
                </div>
                
              </div>
              
            <table id="cashier-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th class="cashier-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
        </div>
      </div>

      <div class="modal fade add-cashier" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Cashier</h4>
              </div>
              <div class="modal-body">
                <div data-parsley-validate class="form-horizontal form-label-left">
                      <div class="error-message"></div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" name="item" required="required" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                       </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="quantity" name="quantity" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                          </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="total" name="total" class="form-control col-md-7 col-xs-12" maxlength="60" readonly>
                                </div>
                        </div>
                  </div>
                      <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary cashier-button">Add</button>
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
            datatable_draw(data[1].id);
            $('.modal').modal('toggle');
        }
    }
    // REFRESH DATATABLE WITHOUT LOADING THE PAGE
    function datatable_draw(id) {
        $("#cashier-datatable").dataTable().fnDestroy();
        var table = $('#cashier-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/cashier/redraw/' + id,
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'item', name: 'item' },
                { data: 'quantity', name: 'quantity' },
                { data: 'price', name: 'price' },
                { data: 'total', name: 'total' },
                { data: function (data, type, dataToSet) {
                    return '<td class="generic-edit action">'+
                            '<div class="form-group" style="display:inline-flex">'+
                                    '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-cashier" id='+data.id+'><i class="fa fa-edit"></i></a>'+
                                    '<a class="btn btn-danger btn-sm delete-data" id='+data.id+' title="Delete"><i class="fa fa-trash"></i></a>'+
                            '</div>'+
                        '</td>';
                }}
            ],
                'columnDefs': [{
                'targets': [5],
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
            url: '/cashier/save',
            method: 'get',
            data: {
                receipt_no: $('#receipt-no').val(),
                item: $('#item').val(),
                quantity: $('#quantity').val(),
                price: $('#price').val(),
                total: $('#total').val(),
                tin: $('#tin').val(),
                resident: $('#resident').val(),
                discount: $('#discount').val(),
                subtotal: $('#subtotal').val(),
                total_amount: $('#total-amount').val(),
                pay_amount: $('#pay-amount').val(),
                change: $('#change').val(),
            },
            success: function (data) {
                validation(data);
                console.log(data);
                $('#sub_total').val(data.total_amount);
                var subtotal = $('#sub_total').val();

                $('#total-amount').val( parseFloat(subtotal));
                $('#record-id').val(data[1].id);
            }
        });
    }
    // AJAX UPDATE DATA
    function update(){
        $.ajax({
            url: '/cashier/update/' + $('#id').val(),
            method: 'get',
            data: {
                entry_number: $('input[name=entry-number]').val(),
                description: $('#description').val(),
                incident_type: $('input[name=incident-type]').val(),
                date_time_report: $('#date-time-report').val(),
                date_time_incident: $('#date-time-incident').val(),
                place_incident: $('input[name=place-incident]').val(),
                surname: $('input[name=surname]').val(),
                firstname: $('input[name=firstname]').val(),
                middlename: $('input[name=middlename]').val(),
                nickname: $('input[name=nickname]').val(),
                citizenship: $('input[name=citizenship]').val(),
                gender: $('input[name=gender]').val(),
                civil_status: $('input[name=civil-status]').val(),
                birthday: $('input[name=birthday]').val(),
                age: $('#age').val(),
                birthplace: $('input[name=birthplace]').val(),
                contact_no: $('input[name=contact-no]').val(),
                current_address: $('input[name=current-address]').val(),
                other_address: $('input[name=other-address]').val(),
                educational: $('input[name=educational]').val(),
                occupation: $('input[name=occupation]').val(),
                card_presented: $('input[name=card-presented]').val(),
                email: $('input[name=email]').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX DELETE DATA
    function delete_data(id){
        $.ajax({
            url: '/cashier/destroy/' + id,
            method: 'get',
            data: {
                cashier: $('input[name=cashier]').val(),
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
            url: '/cashier/edit/' + id,
            method: 'get',
            data: {

            },
            success: function(data) {
                $('.modal-title').text('Update cashier');
                $('.cashier-button').text('Update');

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            var name = k.replace("_", "-");
                            $('#' + name).val(v);
                        });
                    });
                $('.cashier-button').removeClass('store-data');
                $('.cashier-button').addClass('update-data');
            }
        });
    }

    // REFERENCE CODE
    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }
    
    function randomCode(route) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/global/' + route,
            method: 'get',
            data: {
                
            },
            success: function(data) {
                if (data.code === null) {
                    var codes = 0;
                } else {
                    var codes = data.code.id;
                }
                parts = codes;
                parts = pad(parts, 6);
                $('#receipt-no').val(parts);
            }
        });
    }

    var table = $('#cashier-datatable').DataTable({
            'columnDefs': [{
            'targets': [4],
            'orderable': false,            
        }]
    });
  
    $('#quantity, #price').change(function() {
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        if(quantity != '' && price != ''){
            var total = quantity * price;
            $('#total').val(total);
        }
    })

    randomCode('receiptNo');
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
        $('.modal-title').text('Add cashier');
        $('.cashier-button').text('Add');
        $("#item, #quantity, #price, #total").val('');
        $('.cashier-button').removeClass('update-data');
        $('.cashier-button').addClass('store-data');
    })
    // Edit User
    $('body').on('click', '.edit', function() {
        $('.error-message, .success-message').empty();
        edit(this.id);
    });

    $('.print').click(function(){
        if (confirm('Are you sure you want Print this transaction?')) {
                $.ajax({
                url: '/cashier/printReceipt/' + $('#record-id').val(),
                method: 'get',
                data: {

                },
                success: function(data) {
                    
                }
            });
        } 
    })
})

  </script>
@endsection