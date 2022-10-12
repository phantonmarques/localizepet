<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\UserRequest;
use App\ORM\User\Phone\Phone;
use App\ORM\User\Phone\PhoneType;
use App\ORM\User\User;
use App\ORM\User\Role;
use App\ORM\Location\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $filter
     * @return \Illuminate\Http\Response
     */
    public function index($filter = null)
    {
        $users = User::orderBy('name', 'ASC');

        if ($filter === 'trashed') {
            $users = $users->onlyTrashed();
        }

        return view('administrator.pages.users.list')->with([
            'filter'  => $filter,
            'users'   => $users->get()
        ]);
    }

    public function listTrashed()
    {
        return $this->index('trashed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        $phoneTypes = PhoneType::orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('administrator.pages.users.create')->with([
            'roles'      => $roles,
            'phoneTypes' => $phoneTypes,
            'states'     => $states,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create(
                array_merge(
                    $request->all(),
                    ['email_verified_at' => now()]
                )
            );

            $phones = Phone::validatePhones($request->input('phones') ?? []);

            if (empty($phones)) {
                throw new \Exception('É obrigatório cadastro de pelo menos um telefone válido!');
            }

            $user->phones()->createMany($phones);

            DB::commit();

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.create'));

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', exceptionString($exception));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('administrator.pages.users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        $phoneTypes = PhoneType::orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('administrator.pages.users.edit')->with([
            'roles'      => $roles,
            'phoneTypes' => $phoneTypes,
            'states'     => $states,
            'user'       => $user,
            'userPhones' => $user->phones()->get()->keyBy('type_id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user = $user->fill($request->all());

            if ($user->isDirty() && !$user->save()) {
                throw new \Exception('Não foi possível salvar o usuário');
            }

            $phones = Phone::validatePhones($request->input('phones') ?? []);

            if (empty($phones)) {
                throw new \Exception('É obrigatório cadastro de pelo menos um telefone válido!');
            }

            $user->phones()->delete();

            $user->phones()->createMany($phones);

            DB::commit();

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.create'));

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', exceptionString($exception));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::withTrashed()->where('id', $id)->delete();

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', exceptionString($exception));
        }
    }

    /**
     * Recover the specified resource from storage
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recover($id)
    {
        try {
            User::withTrashed()->where('id', $id)->update(['deleted_at' => null]);

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.recover'));

        } catch (\Exception $exception) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exceptionString($exception));

            return redirect()->back()->withInput()->with('error', exceptionString($exception));
        }
    }
}
