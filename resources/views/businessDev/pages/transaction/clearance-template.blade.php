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
                <br>
                @forelse ($certifications as $certification)
                    <p class="text-center">This is to certify that Mr/Mrs/Miss: <u>{{$certification->resident->firstname . ' ' . $certification->resident->surname}}</u> </p>
                @endforelse
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