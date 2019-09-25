@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Resident </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
              <button type="button" class="btn btn-primary pull-right add resident-edit action" data-toggle="modal" data-target=".add-resident"> Add Resident </button>
            <table id="resident-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Resedent ID</th>
                    <th>Full Name</th>
                    <th>Nickname</th>
                    <th>Resident Date</th>
                    <th>Contact</th>
                    <th class="resident-edit action">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($residents as $key => $resident)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$resident->reference}}</td>
                        <td>{{$resident->firstname . ' ' . $resident->middlename . ' ' . $resident->surname}}</td>
                        <td>{{$resident->nickname}}</td>
                        <td>{{$resident->resident_date}}</td>
                        <td>{{$resident->contact_no}}</td>
                        <td class="resident-edit action">
                            <div class="form-group" style="display:inline-flex">
                                    <a class="btn btn-success btn-sm mr-1 view" title="Activate Finger Print"  href={{url('biodata/' . $resident->id)}}><i class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-resident" id={{$resident->id}}><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm delete-data" id={{$resident->id}} title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                      </tr>    
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>

      <div class="modal fade add-resident" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Resident</h4>
              </div>
              <div class="modal-body">
                <div data-parsley-validate class="form-horizontal form-label-left">
                      <div class="error-message"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resident Number<span class="required"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reference" name="reference" required="required" class="form-control col-md-7 col-xs-12" readonly>
                          <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12" readonly>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Resident Date</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="resident-date" name="resident-date" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                          </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Citizenship</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="citizenship" name="citizenship" class="form-control col-md-7 col-xs-12" maxlength="60">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                        <option disabled selected>Choose Sex</option>
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
                                  <input type="number" id="contact-no" name="contact-no" class="form-control col-md-7 col-xs-12" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="current-address" name="current-address" class="form-control col-md-7 col-xs-12" maxlength="200">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Address <small>(optional)</small></label>
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
                  </div>
                      <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary resident-button">Add</button>
              </div>
            </div>
          </div>
         </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/af.js"></script>
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
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        $('#age').val(age);
    }
    // REFRESH DATATABLE WITHOUT LOADING THE PAGE
    function datatable_draw() {
        $("#resident-datatable").dataTable().fnDestroy();
        var table = $('#resident-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/resident/redraw',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'reference', name: 'reference' },
                { data: function (data, type, dataToSet){
                      return data.firstname + ' ' + data.middlename + ' ' + data.surname;
                }},
                { data: 'nickname', name: 'nickname' },
                { data: 'resident_date', name: 'resident_date' },
                { data: 'contact_no', name: 'contact_no' },
                { data: function (data, type, dataToSet) {
                    return '<td class="generic-edit action">'+
                            '<div class="form-group" style="display:inline-flex">'+
                                    '<a class="btn btn-success btn-sm mr-1 view" title="Activate Finger Print"  href="biodata/' + data.id + '"><i class="fa fa-thumbs-up"></i></a>'+
                                    '<a class="btn btn-success btn-sm mr-1 edit" title="Edit" data-toggle="modal" data-target=".add-resident" id='+data.id+'><i class="fa fa-edit"></i></a>'+
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
            url: '/resident/save',
            method: 'get',
            data: {
                reference: $('#reference').val(),
                surname: $('#surname').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                nickname: $('#nickname').val(),
                resident_date: $('#resident-date').val(),
                citizenship: $('#citizenship').val(),
                gender: $('#gender').val(),
                civil_status: $('#civil-status').val(),
                birthday: $('#birthday').val(),
                age: $('#age').val(),
                birthplace: $('#birthplace').val(),
                contact_no: $('#contact-no').val(),
                current_address: $('#current-address').val(),
                other_address: $('#other-address').val(),
                educational: $('#educational').val(),
                occupation: $('#occupation').val(),
                card_presented: $('#card-presented').val(),
                email: $('#email').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX UPDATE DATA
    function update(){
        $.ajax({
            url: '/resident/update/' + $('#id').val(),
            method: 'get',
            data: {
                reference: $('#reference').val(),
                surname: $('#surname').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                nickname: $('#nickname').val(),
                resident_date: $('#resident-date').val(),
                citizenship: $('#citizenship').val(),
                gender: $('#gender').val(),
                civil_status: $('#civil-status').val(),
                birthday: $('#birthday').val(),
                age: $('#age').val(),
                birthplace: $('#birthplace').val(),
                contact_no: $('#contact-no').val(),
                current_address: $('#current-address').val(),
                other_address: $('#other-address').val(),
                educational: $('#educational').val(),
                occupation: $('#occupation').val(),
                card_presented: $('#card-presented').val(),
                email: $('#email').val(),
            },
            success: function (data) {
                validation(data);
            }
        });
    }
    // AJAX DELETE DATA
    function delete_data(id){
        $.ajax({
            url: '/resident/destroy/' + id,
            method: 'get',
            data: {
                resident: $('input[name=resident]').val(),
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
            url: '/resident/edit/' + id,
            method: 'get',
            data: {

            },
            success: function(data) {
                $('.modal-title').text('Update resident');
                $('.resident-button').text('Update');

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            var name = k.replace("_", "-");
                            $('#' + name).val(v);
                        });
                    });
                $('.resident-button').removeClass('store-data');
                $('.resident-button').addClass('update-data');
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
                    var codes = code + "-" + (data.code.id + 1) + "-" + moment().format('YYYY');
                }
                
                var parts = codes.split("-");
                parts[1] = pad(parts[1], 7);
                $('#reference').val(parts.join("-"));
            }
        });
    }

    var table = $('#resident-datatable').DataTable({
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
        randomCode('residentCode','R');
        $('.error-message, .success-message').empty();
        $('.modal-title').text('Add resident');
        $('.resident-button').text('Add');
        $("input[type=text],input[type=number],input[type=email]").not("#input[name=reference]").val('');
        $('.resident-button').removeClass('update-data');
        $('.resident-button').addClass('store-data');
    })
    // Edit User
    $('body').on('click', '.edit', function() {
        $('.error-message, .success-message').empty();
        edit(this.id);
    });

    $("#birthday").change(function(){
        var today = moment($('#birthday').val()).format('Y/MM/D');
        getAge('"' + today + '"');
    });
})
  </script>
@endsection