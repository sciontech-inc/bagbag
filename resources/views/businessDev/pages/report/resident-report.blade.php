@extends('businessDev.master.template')
@section('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="x_panel">
        <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Resident Report</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <div class="success-message"></div>
            <table id="resident-datatable" class="table table-striped table-bordered display">
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
        </div>
      </div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#resident-datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        } );
    });
  </script>
@endsection