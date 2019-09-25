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
                    <th>Reason</th>
                    <th>Start Date</th>
                    <th>Expiration Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clearances as $key => $clearance)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$clearance->resident->reference}}</td>
                        <td>{{$clearance->resident->firstname . ' ' . $clearance->resident->middlename . ' ' . $clearance->resident->surname}}</td>
                        <td>{{$clearance->purpose}}</td>
                        <td>{{($clearance->created_at)->format('d-m-Y')}}</td>
                        <td>{{($clearance->created_at)->format('d-m-') . (($clearance->created_at)->format('Y') + 1)}}</td>
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