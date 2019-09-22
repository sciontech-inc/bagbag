@extends('businessDev.master.template')

@section('content')
    <div class="x_panel">
        <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Activate Fingerprint </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
            <table id="resident-datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Resedent ID</th>
                    <th>Full Name</th>
                    <th>Nickname</th>
                    <th>Resident Date</th>
                    <th>Contact</th>
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
                      </tr>    
                  @endforeach
                </tbody>
              </table>
              <br>
              @foreach ($biodatas as $key => $biodata)
                <input type="hidden" name="latestId" id="latestId" value="{{$biodata->id}}">
              @endforeach
              @foreach ($residents as $key => $resident)
                <input type="hidden" name="resident_id" id="resident_id" value="{{$resident->id}}">
              @endforeach
              <button class="btn btn-primary" id="fp">Save Fingerprint</button>
              <h1>Active your Fingerprint : <span class="activate_fingerprint"></span></h1>
        </div>
      </div>
@endsection

@section('scripts')
  <script>
    $(function(){
      $('#fp').click(function(){
          $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/biodata/fingerprint/' + $('#latestId').val(),
                method: 'get',
                success: function (data) {
                        if (data.success == false) {
                            $('.activate_fingerprint').empty();
                            $('.activate_fingerprint').append('No fingerprint Detected')
                        } else {
                          $.ajax({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              url: '/biodata/residentUpdate',
                              data: {
                                 biodata: data[0].id,
                                 resident: $('#resident_id').val(),
                              },
                              method: 'get',
                              success: function (data) {
                                  $('.activate_fingerprint').empty();
                                  $('.activate_fingerprint').append('Fingerprint Activated');
                                  $('#fp').attr('disabled', true);
                              },
                          });
                        }
                },
            });
      })
    })
  </script>
@endsection