<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Utils\Utility;

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
    private $utils;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->utils = new Utility();
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
            'name' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'cin' => $data['cin'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // override register method, so when admin add new user
    // it does not auto login to that user
    public function register(Request $request)
    {
        if ($this->utils->isAdmin()) {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        } else {
            return redirect($this->utils::welcome);
        }
    }


    // prevent authenticated normal users to visit register route
    public function showRegistrationForm()
    {
        if ($this->utils->isAdmin()) {
            return view('auth.register');
        } else {
            return redirect($this->utils::welcome);
            // return redirect($this->utils::home);
        }
    }

}
