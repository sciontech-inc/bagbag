<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barangay || Bagbag</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
</head>

<body>
        <section class="queue-table">
                <div class="container-fluid">
                    <h1 class="text-center">
                        <a class="btn btn-primary" style="float:left; marign-right:10px" href="{{url('barangay')}}">Go to Website</a> &nbsp&nbsp&nbsp
                        <a class="btn btn-warning" style="float:left" id="queue">Get Queue Number</a> 
                        Queue List Today !</h1>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="font-size:20px">Queue Number</th>
                            <th style="font-size:20px">Resident</th>
                            <th style="font-size:20px">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($queue as $key => $item)
                           @if ($key == 0)
                                <tr>
                                    <td style="font-size:25px">{{$item->queue_no}}</td>
                                    <td style="font-size:20px">{{$item->user->firstname . ' ' . $item->user->surname}}</td>
                                    <td style="font-size:20px">{{$item->date}}</td>
                                </tr>
                           @else
                                <tr>
                                    <td style="font-size:17px">{{$item->queue_no}}</td>
                                    <td style="font-size:17px">{{$item->user->firstname . ' ' . $item->user->surname}}</td>
                                    <td style="font-size:17px">{{$item->date}}</td>
                                </tr>
                           @endif
                          @endforeach
                        </tbody>
                    </table>
        
                    <table id="user-datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Queue Number</th>
                            <th>Resident</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($queues as $key => $queue)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$queue->queue_no}}</td>
                                    <td>{{$queue->user->firstname . ' ' . $queue->user->surname}}</td>
                                    <td>{{$queue->date}}</td>
                                    <td>{{$queue->purpose}}</td>
                                    <td>{{$queue->status}}</td>
                                  </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
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
                                            <select name="purpose" id="purpose" class="form-control col-md-7 col-xs-12">
                                                <option value="Barangay Clearance">Barangay Clearance</option>
                                                <option value="Cedula">Cedula</option>
                                                <option value="Blotter">Blotter</option>
                                            </select>
                                        </div>
                                        <br>
                                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary purpose-button">Submit</button>
                    </div>
                  </div>
                </div>
        </div>
</body>
<script>
        // REFERENCE CODE
        function pad(str, max) {
            str = str.toString();
            return str.length < max ? pad("0" + str, max) : str;
        }
        
        function randomCode(route,code, purpose) {
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
                        var codes = code + "-" + 1 + "-" + moment().format('MM-D');
                    } else {
                        var codes = code + "-" + (data.code.id + 1) + "-" + moment().format('MM-D');
                    } 
                    
                    var parts = codes.split("-");
                    parts[1] = pad(parts[1], 5);

                    if (confirm('Are you sure you want to get this Queue Number? ' + parts.join("-") + '. Take a picture on Queue # or write it down.')) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/queue/save',
                                method: 'get',
                                data: {
                                    queue_no: parts.join("-"),
                                    date: moment().format('MM-D-YYYY'),
                                    purpose: purpose,
                                    status: 'On-Queue',
                                },
                                success: function(data) {
                                    alert('Successfully get Queue Number !');
                                    location.reload();
                                }
                            });
                    }
                }
            });
        }

        setInterval(() => {
            location.reload();
        }, 5000);
        $('#queue').click(function(){
            $('.modal').modal('toggle');
        })

        $('.purpose-button').click(function(){
            var purpose = $('#purpose').val();
            randomCode('queuingCode','QN', purpose);
        })
    </script>
</html>