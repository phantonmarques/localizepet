<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UserRequest;
use App\ORM\Location\State;
use App\ORM\User\User;
use App\ORM\User\UserEmailVerify;
use App\Providers\RouteServiceProvider;
use App\Traits\Auth\UserEmailVerifiedTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    use UserEmailVerifiedTrait;

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
        $this->middleware('guest')->except('confirm');
    }

    /**
     * View create user common
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $states = State::pluck('name', 'id');

        return view('site.pages.user.create')->with([
            'states' => $states
        ]);
    }

    /**
     * Store user common
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create($request->except(['email_verified_at', 'role_id']));

            if (!$this->validateConfirmEmail($user)) {
                throw new \Exception('não foi possivel enviar e-mail');
            }

            DB::commit();

            return redirect()->route('site.auth.show-login')->with([
                'success' => trans('message_alert.success.create'),
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Erro ao criar usuário comum: ' . $e->getMessage());

            return redirect()->back()->withErrors(trans('message_alert.error.create'))
                ->withInput();
        }
    }

    /**
     * Information confirm of e-mail
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConfirm()
    {
        return view('site.pages.auth.confirm');
    }

    /**
     * Confirm e-mail
     *
     * @param $token
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm($token)
    {
        try {
            $userEmailVerify = UserEmailVerify::where('token', $token)->first();

            if (is_null($userEmailVerify) || is_null($userEmailVerify->user)) {

                throw new \Exception('Token inválido');
            } elseif ($userEmailVerify->user->hasVerifiedEmail()) {

                throw new \Exception('Token já foi utilizado');
            } elseif (Carbon::createFromFormat('Y-m-d H:i:s', $userEmailVerify->token_expires) < Carbon::now()) {

                $this->validateConfirmEmail($userEmailVerify->user);

                throw new \Exception('Token expirado');
            }

            $userEmailVerify->user->forceFill([
                'email_verified_at' => Carbon::now(),
            ])->save();

            return view('site.pages.auth.confirm')->with([
                'success' => true
            ]);

        } catch (\Exception $e) {

            Log::error("Erro ao confirmar e-mail com o token [{$token}] de usuário comum: " . exception_details($e));

            return view('site.pages.auth.confirm')->with([
                'error' => $e->getMessage()
            ]);

        }
    }
}
