<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Resident;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/barangay';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nickname' => 'required | string | max:60',
            'resident_date' => 'required | max:200',
            'citizenship' => 'required | string | max:60',
            'gender' => 'required | string | max:60',
            'civil_status' => 'required | string | max:60',
            'birthday' => 'required | string | max:60',
            'age' => 'required | max:60',
            'birthplace' => 'required | string | max:60',
            'contact_no' => 'required | max:60',
            'number' => 'required | string | max:180',
            'street' => 'required | string | max:180',
            'barangay' => 'required | string | max:180',
            'city' => 'required | string | max:180',
            'other_address' =>  'max:180',
            'educational' => 'required | string | max:60',
            'occupation' => 'required | string | max:60',
            'card_presented' => 'required | string | max:60',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $code = Resident::latest('id')->withTrashed()->first();
        if ($code === NULL) {
            $productCode = 'R-' . str_pad(1, 7, '0', STR_PAD_LEFT) . Carbon::now()->format('-Y');
        } else {
            $productCode = 'R-' . str_pad($code->id, 7, '0', STR_PAD_LEFT) . Carbon::now()->format('-Y');
        }

        Resident::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'reference' => $productCode,
            'nickname' => $data['nickname'],
            'age' => $data['age'],
            'resident_date' => $data['resident_date'],
            'citizenship' => $data['citizenship'],
            'gender' => $data['gender'],
            'civil_status' => $data['civil_status'],
            'birthplace' => $data['birthplace'],
            'birthday' => $data['birthday'],
            'contact_no' => $data['contact_no'],
            'current_address' => $data['number'] . ' ' . $data['street'] . ' ' . $data['barangay'] . ' ' . $data['city'],
            'other_address' => $data['other_address'],
            'educational' => $data['educational'],
            'occupation' => $data['occupation'],
            'card_presented' => $data['card_presented'],
        ]);

        return User::create([
            'role' => $data['role'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
         
    }
}
