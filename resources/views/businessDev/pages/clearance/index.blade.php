@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Barangay Clearance </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
              <button type="button" class="btn btn-primary pull-right add clearance-edit action" data-toggle="modal" data-target=".add-clearance"> Add Supp/Manu </button>
            <table id="clearance-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Entry Number</th>
                    <th>Full Name</th>
                    <th>Nickname</th>
                    <th>Type of Incident</th>
                    <th>Date/Time Reported</th>
                    <th>Date/Time Incident</th>
                    <th>Place of Incident</th>
                    <th>Contact</th>
                    <th class="clearance-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clearances as $key => $clearance)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$clearance->entry_number}}</td>
                        <td>{{$clearance->firstname . ' ' . $clearance->middlename . ' ' . $clearance->lastname}}</td>
                        <td>{{$clearance->nickname}}</td>
                        <td>{{$clearance->incident_type}}</td>
                        <td>{{$clearance->date_time_report}}</td>
                        <td>{{$clearance->date_time_incident}}</td>
                        <td>{{$clearance->place_incident}}</td>
                        <td>{{$clearance->contact_no}}</td>
                        <td class="clearance-edit action">
                            <div class="form-group" style="display:inline-flex">
                                    <a class="btn btn-success btn-sm mr-1 view" title="View" data-toggle="modal" data-target=".add-clearance" id={{$clearance->id}}><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-clearance" id={{$clearance->id}}><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm delete-data" id={{$clearance->id}} title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                      </tr>    
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>

      <div class="modal fade add-clearance" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Barangay Clearance</h4>
              </div>
              <div class="modal-body">
                <div data-parsley-validate class="form-horizontal form-label-left">
                      <div class="error-message"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Entry Number<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="entry-number" name="entry-number" required="required" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Incident<span class="required"></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="incident-type" id="incident-type" class="form-control col-md-7 col-xs-12">
                                <option selected disabled>Choose Type of Incident</option>
                                @foreach ($incident_types as $incident_type)
                                    <option value="{{$incident_type->id}}">{{$incident_type->incident_type}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date/Time Reported</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="date-time-report" name="date-time-report" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date/Time Incident</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="datetime-local" id="date-time-incident" name="date_time_incident" class="form-control col-md-7 col-xs-12" maxlength="60" onkeydown="return event.keyCode !== 69">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Place of Incident</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" id="place-incident" name="place-incident" class="form-control col-md-7 col-xs-12" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Surname</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="surname" name="surname" class="form-control col-md-7 col-xs-12" style="text-transform:unset !important" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="firstname" name="firstname" class="form-control col-md-7 col-xs-12" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="middlename" name="middlename" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nickname</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="nickname" name="nickname" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Citizenship</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="citizenship" name="citizenship" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                        <option disabled selected>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Civil Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="civil-status" name="civil-status" class="form-control col-md-7 col-xs-12">
                                                <option disabled selected>Choose Civil Status</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Single">Single /option>
                                        </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthday</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="date" id="birthday" name="birthday" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Age</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="age" name="age" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Birth Place</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="birthplace" name="birthplace" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="contact-no" name="contact-no" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="current-address" name="current-address" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Address</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="other-address" name="other-address" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Highest Educational Attainment</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="educational" name="educational" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="occupation" name="occupation" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Card Presented</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="card-presented" name="card-presented" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea name="description" id="description" class="form-control col-md-7 col-xs-12" cols="30" rows="10"></textarea>
                                </div>
                        </div>
                  </div>
                      <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary clearance-button">Add</button>
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
        $("#clearance-datatable").dataTable().fnDestroy();
        var table = $('#clearance-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/clearance/redraw',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'entry_number', name: 'entry_number' },
                { data: 'firstname', name: 'firstname' },
                { data: 'nickname', name: 'nickname' },
                { data: 'incident_type', name: 'incident_type' },
                { data: 'date_time_report', name: 'date_time_report' },
                { data: 'date_time_incident', name: 'date_time_incident' },
                { data: 'place_incident', name: 'place_incident' },
                { data: 'contact_no', name: 'contact_no' },
                { data: function (data, type, dataToSet) {
                    return '<td class="generic-edit action">'+
                            '<div class="form-group" style="display:inline-flex">'+
                                    '<a class="btn btn-success btn-sm mr-1 view" title="View" data-toggle="modal" data-target=".add-clearance" id='+data.id+'><i class="fa fa-eye"></i></a>'+
                                    '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-clearance" id='+data.id+'><i class="fa fa-edit"></i></a>'+
                                    '<a class="btn btn-danger btn-sm delete-data" id='+data.id+' title="Delete"><i class="fa fa-trash"></i></a>'+
                            '</div>'+
                        '</td>';
                }}
            ],
                'columnDefs': [{
                'targets': [8],
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
            url: '/clearance/save',
            method: 'get',
            data: {
                entry_number: $('input[name=entry-number]').val(),
                description: $('#description').val(),
                incident_type: $('#incident-type').val(),
                date_time_report: $('#date-time-report').val(),
                date_time_incident: $('#date-time-incident').val(),
                place_incident: $('input[name=place-incident]').val(),
                surname: $('input[name=surname]').val(),
                firstname: $('input[name=firstname]').val(),
                middlename: $('input[name=middlename]').val(),
                nickname: $('input[name=nickname]').val(),
                citizenship: $('input[name=citizenship]').val(),
                gender: $('#gender').val(),
                civil_status: $('#civil-status').val(),
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
    // AJAX UPDATE DATA
    function update(){
        $.ajax({
            url: '/clearance/update/' + $('#id').val(),
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
            url: '/clearance/destroy/' + id,
            method: 'get',
            data: {
                clearance: $('input[name=clearance]').val(),
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
            url: '/clearance/edit/' + id,
            method: 'get',
            data: {

            },
            success: function(data) {
                $('.modal-title').text('Update clearance');
                $('.clearance-button').text('Update');

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            var name = k.replace("_", "-");
                            $('#' + name).val(v);
                        });
                    });
                $('.clearance-button').removeClass('store-data');
                $('.clearance-button').addClass('update-data');
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
                $('#entry-number').val(parts.join("-"));
            }
        });
    }

    var table = $('#clearance-datatable').DataTable({
            'columnDefs': [{
            'targets': [8],
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
        randomCode('registerCode','R');
        $('.error-message, .success-message').empty();
        $('.modal-title').text('Add clearance');
        $('.clearance-button').text('Add');
        $("input[type=text],input[type=number],input[type=email]").not("#input[name=reference]").val('');
        $('.clearance-button').removeClass('update-data');
        $('.clearance-button').addClass('store-data');
    })
    // Edit User
    $('body').on('click', '.edit', function() {
        $('.error-message, .success-message').empty();
        edit(this.id);
    });
})

  </script>
@endsection