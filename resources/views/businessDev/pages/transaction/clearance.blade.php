@extends('businessDev.master.template')
@section('links')  
@endsection
@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Projects</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('businessDev.partials.flash-message')
        <button onclick="printDiv('clearance')" class="btn btn-primary">Print</button>
        <button type="button" class="btn btn-primary pull-right add blotter-edit action" data-toggle="modal" data-target=".add-certification"> Create Certification </button>
        <div id="clearance">
            <header>
                <div class="header">
                    <div class="header-left">
                        <img src="{{asset('images/require/republic.png')}}" id="republic" style="width: 100px !important;" class="center">
                    </div>

                    <div class="header-center">
                        <p class="text-center"><b>Republic of the Philippines</b></p>
                        <p class="text-center"><b>District 5 : Barangay Bagbag</b></p>
                        <p class="text-center"><b>Address : Barangay Bagbag, Novaliches, Q.C, Philippines.</b></p>
                        <p class="text-center"><b>Contact : +632 413-2002</b></p>
                    </div>

                    <div class="header-right">
                        <img src="{{asset('images/require/bagbag.jpg')}}" id="republic" style="width: 100px !important;" class="center">
                    </div>
                </div>
            </header>
            <br>
            <div class="title">
                    <label class="text-center title-clearance">CERTIFICATION / CLEARANCE</label>
            </div>
            
            <div class="clearance-body">
                <p>To Whom it may concern:</p>
                @foreach ($certifications as $certification)
                    <p style="text-indent: 5em;">This is to certify that Mr/Mrs/Miss: <u>{{$certification->resident->firstname . ' ' . $certification->resident->surname}}</u> of Legal age, single</p>
                    <p>married, separated, widow, widower is a certified resident of this barangay, with postal address at <u>{{$certification->resident->current_address}}</u> </p>
                    <p>and known to me of good moral character.</p>

                    <p style="text-indent: 5em;">Certify further that as per filed in this office subject person, has NO derogatory records as of this</p>
                    <p> date of issue</p>
                    <p style="text-indent: 5em;">This certification is hereby issued upon the request of the above subject person in connection to his/her application for <u>{{$certification->purpose}}</u>.</p>


                    <p style="text-indent: 5em;">Given this <u>{{($certification->created_at)->format('d')}}th</u> day of <u>{{($certification->created_at)->format('M')}}</u>, <u>{{($certification->created_at)->format('Y')}}</u> at City of Novaliches, and will expire on  <u>{{($certification->created_at)->format('d')}}th</u> day of <u>{{($certification->created_at)->format('M')}}</u>, <u>{{($certification->created_at)->format('Y') + 1}}</u>.</p>
                   <br>
                   <br>
                   <br>
                    <center> <img src="{{asset('images/'. $certification->image)}}" alt="image" width="300px"> </center>
                    <p class="text-center">{{$certification->resident->firstname . ' ' . $certification->resident->surname}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade add-certification" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Event</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" id="modal-form" action="{{ url('transaction/store') }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Resident<span class="required"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="resident_id" id="resident_id" class="form-control">
                                      <option disabled selected>Choose Resident</option>
                                      @foreach ($residents as $resident)
                                          <option value="{{$resident->id}}"> {{$resident->firstname . ' ' . $resident->surname}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Purpose<span class="required"></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12" name="purpose" id="purpose"  maxlength="200">
                                    </div>
                              </div>
                              <div class="form-group ">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Picture<span class="required"></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary user-button">Add</button>
            </form>
            </div>
          </div>
        </div>
       </div>
@endsection

@section('scripts')
  <script>

function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
$(document).ready(function(){
		
})
  </script>
@endsection