<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => $data['photo'],
            'gender' => $data['gender'],
            'no_telp' => $data['no_telp'],
            'is_active'=> '1'
        ]);
    }
    public function register(Request $request){
        // dd($request);
        $imagePath = $request->file('photo')->store('images',['disk' => 'public']);
        $this->validator($request->all())->validate();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'photo' => $imagePath,
            'gender' => $request['gender'],
            'no_telp' => $request['no_telp'],
            'is_active'=> '1'
        ]);

        if(empty($user)){
            redirect()->route('register');
        }
        return redirect()->route('login');
    }
//     public function register_admin(Request $request){
//         $validateData=$request->validate([
//             'name'=>'required|max:255',
//             'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
//             'password'=> 'required', 'string', 'min:8', 'confirmed',
//             'gender'=>'required|String',
//             'no_telp'=>'required|integer',
//             'role_id'=>'required',
//             'photo'=>'image',
//         ]);
//         if($request->file('photo')){
//              $validateData['photo'] =$request->file('photo')->store('images',['disk' => 'public']);
//          User::create([
//             'name' => $validateData['name'],
//             'email' => $validateData['email'],
//             'password' => Hash::make($validateData['password']),
//             'photo' => $validateData['photo'],
//             'gender' => $validateData['gender'],
//             'no_telp' => $validateData['no_telp'],
//             'role_id' => $validateData['role_id'],
//             'is_active'=> '1'
//         ]);
//     }
//     return redirect()->route('index.php');

// }
// public function register_admin_view(){
//     return view('auth/register_admin');

// }
}
