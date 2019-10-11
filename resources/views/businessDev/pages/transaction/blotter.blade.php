@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Blotter </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
            <table id="blotter-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Suspect</th>
                    <th>Victim</th>
                    <th>Reason</th>
                    <th>Date Time</th>
                    <th>Place</th>
                    <th>Fingerprint</th>
                    <th>Description</th>
                    <th class="blotter-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($blotters as $key => $blotter)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$blotter->suspect}}</td>
                        <td>{{$blotter->victim . ' ' . $blotter->middlename . ' ' . $blotter->surname }}</td>
                        <td>{{$blotter->reason . ' ' . $blotter->middlename . ' ' . $blotter->surname }}</td>
                        <td>{{$blotter->datetime}}</td>
                        <td>{{$blotter->place}}</td>
                        <td>{{$blotter->fingerprint}}</td>
                        <td>{{$blotter->description}}</td>
                        <td class="blotter-edit action">
                            <div class="form-group" style="display:inline-flex">
                                <a class="btn btn-danger btn-sm delete-data" id={{$blotter->id}} title="Delete"><i class="fa fa-trash"></i></a>
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
              <h4 class="modal-title" id="myModalLabel">Reason to Delete</h4>
            </div>
            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" maxlength="180">
                                  <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" maxlength="180">
                                </div>
                                <br>
                              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary description-button">Submit</button>
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
        $("#blotter-datatable").dataTable().fnDestroy();
        var table = $('#blotter-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/blotter/redraw',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'reference', name: 'reference' },
                { data: function(data, type, dataToSet){
                        return data.firstname + ' ' + data.middlename + ' ' + data.surname;
                }},
                { data: function(data, type, dataToSet){
                        return data.firstname + ' ' + data.middlename + ' ' + data.surname;
                }},
                { data: 'incident_type', name: 'incident_type' },
                { data: 'date_report', name: 'date_report' },
                { data: 'date_incident', name: 'date_incident' },
                { data: 'place', name: 'place' },
                { data: 'description', name: 'description' },
                { data: function (data, type, dataToSet) {
                    return '<td class="generic-edit action">'+
                            '<div class="form-group" style="display:inline-flex">'+
                                    '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-blotter" id='+data.id+'><i class="fa fa-edit"></i></a>'+
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
    }
    // AJAX STORE DATA
    function add() {
        $.ajax({
            url: '/blotter/save',
            method: 'get',
            data: {
                reference: $('#reference').val(),
                complainant: $('#complainant').val(),
                respondent: $('#respondent').val(),
                incident_type: $('#incident-type').val(),
                date_report: $('#date-report').val(),
                date_incident: $('#date-incident').val(),
                place: $('#place').val(),
                description: $('#description').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX UPDATE DATA
    function update(){
        $.ajax({
            url: '/blotter/update/' + $('#id').val(),
            method: 'get',
            data: {
                reference: $('#reference').val(),
                complainant: $('#complainant').val(),
                respondent: $('#respondent').val(),
                incident_type: $('#incident-type').val(),
                date_report: $('#date-report').val(),
                date_incident: $('#date-incident').val(),
                place: $('#place').val(),
                description: $('#description').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX DELETE DATA
    function delete_data(id, description){
        $.ajax({
            url: '/blotter/destroy/' + id,
            method: 'get',
            data: {
                blotter: $('input[name=blotter]').val(),
                description: description,
            },
            success: function (data) {
                location.reload();
            }
        });
    }
    // CLICKING THE EDIT BUTTON
    function edit(id) {
        $.ajax({
            url: '/blotter/edit/' + id,
            method: 'get',
            data: {

            },
            success: function(data) {
                $('.modal-title').text('Update blotter');
                $('.blotter-button').text('Update');

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            var name = k.replace("_", "-");
                            $('#' + name).val(v);
                        });
                    });
                $('.blotter-button').removeClass('store-data');
                $('.blotter-button').addClass('update-data');
            }
        });
    }

    // REFERENCE CODE
    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }
    
    function randomCode(route,code) {
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
                    var codes = code + "-" + 0 + "-" + moment().format('YYYY');
                } else {
                    var codes = code + "-" + data.code.id + "-" + moment().format('YYYY');
                }
                
                var parts = codes.split("-");
                parts[1] = pad(parts[1], 7);
                $('#reference').val(parts.join("-"));
            }
        });
    }

    var table = $('#blotter-datatable').DataTable({
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
            $('.add-modal').modal('show');
            $('#id').val(this.id);
        }
    });

    $('.description-button').click(function() {
        delete_data($('#id').val(), $('#description').val());
    })

    $('body').on('click', '.update-data', function() {
        update();
    });

    // CLICKING THE ADD USER
    $('.add').click(function() {
        randomCode('blotterCode','R');
        $('.error-message, .success-message').empty();
        $('.modal-title').text('Add blotter');
        $('.blotter-button').text('Add');
        $("input[type=text],input[type=number],input[type=email]").not("#input[name=reference]").val('');
        $('.blotter-button').removeClass('update-data');
        $('.blotter-button').addClass('store-data');
    })
    // Edit User
    $('body').on('click', '.edit', function() {
        $('.error-message, .success-message').empty();
        edit(this.id);
    });
})

  </script>
@endsection