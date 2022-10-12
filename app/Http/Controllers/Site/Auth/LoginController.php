<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Traits\Auth\UserEmailVerifiedTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers, UserEmailVerifiedTrait;

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

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $data = [
                'email'     => $request->email,
                'password'  => $request->password
            ];
        
            if (Auth::guard('web')->attempt($data, $request->filled('remember')) === false) {

                throw new \Exception('Login/Senha inválido(s)');
            }

            if (Auth::user()->hasVerifiedEmail() == false) {

                if (!$this->validateConfirmEmail(Auth::user())) {
                    throw new \Exception('Não foi possível enviar e-mail');
                }

                Auth::logout();

                return redirect()->route('site.auth.show-confirm');
            }

            return redirect()->route('site.index');
        
        } catch (\Exception $exception) {

            Auth::guard('web')->logout();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput($request->only('email'))->with('error', trans('auth.invalid'));
        }
    }

    public function showLogin()
    {
        return view('site.pages.auth.login');
    }
    
}
