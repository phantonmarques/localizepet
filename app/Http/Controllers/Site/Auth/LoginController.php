<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => 'required|string',
            'password' => 'required|min:6',
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request->input());

        $user = null;

        try {

            $data = [
                attributeLogin($request->email) => $request->email, 
                'password' => $request->password
            ];
        
            if(Auth::guard('web')->attempt($data, $request->filled('remember')) === false)
                throw new \Exception(trans('auth.invalid'));

            $user = Auth::guard('web')->user();

            //if ($seller->company->contract->approve)
            //    throw new \Exception(trans('auth.contract-to-approval'));

            // event(new SellerLoginEvent($seller));

            return redirect()->route('site.index');
        
        } catch (\Exception $e) {
            // Auth::guard('seller')->logout();

            //if ($hasPendingFinancial)
            //    return redirect()->route('pending.financial', ['company' => $seller->company ?? null]);
            
            return redirect()->back()->withInput($request->only('email'))->with('error', $e->getMessage());
        }
    }

    public function showLogin()
    {
        return view('site.pages.auth.login');
    }
    
}
