<section class="queue-table">
        <div class="container-fluid">
            <h1 class="text-center">Queue List Today !</h1>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="font-size:20px">Queue Number</th>
                    <th style="font-size:20px">Resident</th>
                    <th style="font-size:20px">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($queue as  $item)
                  <tr>
                    <td style="font-size:20px">{{$item->queue_no}}</td>
                    <td style="font-size:20px">{{$item->user->firstname . ' ' . $item->user->surname}}</td>
                    <td style="font-size:20px">{{$item->date}}</td>
                  </tr>
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
                            <td>{{$queue->status}}</td>
                          </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
</section>