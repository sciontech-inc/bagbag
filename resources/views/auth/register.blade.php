@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
                                    <input id="role" type="hidden" class="form-control" name="role" value="User" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Middlename') }}</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required autocomplete="name" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autocomplete="name" autofocus>
                                    </div>
                        </div>
                        <div class="form-group row">
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required >
    
                                    @error('nickname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="resident_date" class="col-md-4 col-form-label text-md-right">{{ __('Resident Date') }}</label>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="resident_date" type="date" class="form-control @error('resident_date') is-invalid @enderror" name="resident_date" value="{{ old('resident_date') }}" required >
    
                                    @error('resident_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="Citizenship" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship') }}</label>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="citizenship" type="text" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="{{ old('citizenship') }}" required >
    
                                    @error('citizenship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Sex</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}">
                                        <option disabled selected>Choose Sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Civil Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                        <select id="civil_status" name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" value="{{ old('civil_status') }}">
                                                <option disabled selected>Choose Civil Status</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Single">Single /option>
                                        </select>
                                        @error('civil_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Birthday</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <input type="date" id="birthday" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" maxlength="60">
                                </div>
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Age</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12  ">
                                    <input type="number" id="age" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" maxlength="60" readonly>
                                </div>
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Birth Place</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <input type="text" id="birthplace" name="birthplace" class="form-control  @error('birthplace') is-invalid @enderror" value="{{ old('birthplace') }}" maxlength="60">
                                </div>
                                @error('birthplace')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Contact</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                    <input type="number" id="contact_no" name="contact_no" class="form-control @error('contact_no') is-invalid @enderror" value="{{ old('contact_no') }}" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;">
                                </div>
                                @error('contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"># / Blck</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                    <input type="text" id="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" maxlength="200">
                                </div>
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Street</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                <input type="text" id="street" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}" maxlength="200">
                            </div>
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Barangay</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                    <input type="text" id="barangay" name="barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ old('barangay') }}" maxlength="200">
                                </div>
                                @error('barangay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">City</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" maxlength="200">
                            </div>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Other Address <small>(optional)</small></label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12 ">
                                    <input type="text" id="other_address" name="other_address" class="form-control @error('other_address') is-invalid @enderror" value="{{ old('other_address') }}" maxlength="60">
                                </div>
                                @error('other_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Highest Educational Attainment</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <input type="text" id="educational" name="educational" class="form-control  @error('educational') is-invalid @enderror" value="{{ old('educational') }}" maxlength="60">
                                </div>
                                @error('educational')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Occupation</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <input type="text" id="occupation" name="occupation" class="form-control  @error('occupation') is-invalid @enderror" value="{{ old('occupation') }}" maxlength="60">
                                </div>
                                @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">ID Card Presented</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
                                    <input type="text" id="card_presented" name="card_presented" class="form-control @error('card_presented') is-invalid @enderror" value="{{ old('card_presented') }}" maxlength="60">
                                </div>
                                @error('card_presented')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 col-sm-6 col-xs-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
    $('#birthday').change(function(){
        var birth = this.value;
        dob = new Date(birth);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
    })
   })
</script>
@endsection
