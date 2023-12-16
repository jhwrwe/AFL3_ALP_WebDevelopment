<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $Admin=[
            'email'=> $request->email,
            'password'=> $request->password,
            'role_id'=>1,
            'is_active'=> '1',
        ];

        $Staff=[
            'email'=> $request->email,
            'password'=> $request->password,
            'role_id'=>2,
            'is_active'=> '1',
        ];
        $User=[
            'email'=> $request->email,
            'password'=> $request->password,
            'role_id'=>3,
            'is_active'=> '1',
        ];

        if(Auth::attempt($Admin)){
            $this->isLogin(Auth::id());
            return redirect()->route('index');
        }else if(Auth::attempt($Staff)){
            $this->isLogin(Auth::id());
            return redirect()->route('index');
        }else if(Auth::attempt($User)){
            $this->isLogin(Auth::id());
            return redirect()->route('index');
        }
    return redirect()->route('login');
    }
     public function isLogin(int $id){
        $user = User::findOrFail($id);
        return $user->update([
            'is_login'=>'1'
        ]);
        }
        public function logout(Request $request){
            $user = User::findOrFail(Auth::id());
            $user->update([
                'is_login'=>'0'
            ]);
            $request->session()->invalidate();
            return $this->loggedOut($request) ?: redirect('login');
        }
}
