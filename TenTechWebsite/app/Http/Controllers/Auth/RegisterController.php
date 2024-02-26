<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\UserAddress;
use App\Models\UserPayments;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // the password needs to have a minimum of 8 chars, at least one letter, a mix of lower case
            // and upper case letters and at least one digit
            /** Interestingly, the JS file on the client-side will have the buttons disabeled 
             * until the client-side validation passes but this controller is the 'backend' where 
             * the server side validation of the form data is done and cannot be manipulated by the client 
             * , however, under the assumption that the user does not sabotage the JS script
             *  then this controller validation will always pass since the JS will have made sure that
             * the entered password passes the validation logic of the controller, thereby reducing 
             * server stress as less password attempts will be made
             */
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // create user address and user payment information
        UserAddress::create([
            // create all null values for the user address
            'address_line_1' => null,
            'address_line_2' => null,
            'city' => null,
            'post_code' => null,
            'country' => null,
            'user_id' => $user->id
        ]);

        // create all null values for the user payment
        UserPayments::create([
            'card_number' => null,
            'card_holder_name' => null,
            'expiry_date' => null,
            'cvv' => null,
            'user_id' => $user->id
        ]);
        
        return $user;
    }
}
