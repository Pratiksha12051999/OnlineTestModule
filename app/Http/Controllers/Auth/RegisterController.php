<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/home';
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
            
            'name' =>'required|min:2|max:50',
            'email' =>'required|email',
            'phone' =>'required|digits:10',
            'address' =>'required|string|max:255',
            'pin' =>'required|min:6|max:6',
            'percent' =>'required|between:0,99.99',
            'dte'=>'required|regex:/(^[a-zA-Z]{2}\d{8}$)/u',
            'password' =>'required|min:6|max:20|confirmed',
            
        ],[

            'name.required' => 'Name is required',

            'name.min' => 'Name must be at least 2 characters.',

            'name.max' => 'Name should not be greater than 50 characters.',
            'phone.digits' => 'Phone no should be 10 digits',

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
        $user=User::create([
            'name' =>$data['name'],
            'email' =>$data['email'],
            'phone' =>$data['phone'],
            'address' =>$data['address'],
            'pin' =>$data['pin'],
            'percent' =>$data['percent'],
            'dte' =>$data['dte'],
            'role' => $data['role'],
            'password' =>bcrypt($data['password']),
            'token'=>str_random(26),
        ]);
        $user->sendVerificationEmail();

        return $user;
    }
    
}