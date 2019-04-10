<?php

namespace App\Http\Controllers\Auth;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;


class StudentRegisterController extends Controller
{

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
    public function showRegisterForm() {
        return view('auth.student-register');
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric|max:12|phone',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $data)
    {
        $success = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        if($success)
        {
            return redirect('/student/register')->with('alert-success','Your account was successful added!');
        }
        else
        {
            return redirect('/student/register')->with('alert-danger','Error happened!');
        }

    }
}
