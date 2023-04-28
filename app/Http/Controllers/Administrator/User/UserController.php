<?php

namespace App\Http\Controllers\Administrator\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\UserRequest;
use App\ORM\User\Phone\Phone;
use App\ORM\User\Phone\PhoneType;
use App\ORM\User\User;
use App\ORM\User\Role;
use App\ORM\Location\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index($filter = null): View
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

    public function create(): View
    {
        return view('administrator.pages.users.create')->with([
            'roles'      => Role::orderBy('name')->get(),
            'phoneTypes' => PhoneType::orderBy('name')->get(),
            'states'     =>State::orderBy('name')->get(),
        ]);
    }

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

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', exception_details($e));
        }
    }

    public function show(User $user): View
    {
        return view('administrator.pages.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('administrator.pages.users.edit')->with([
            'roles'      => Role::orderBy('name')->get(),
            'phoneTypes' => PhoneType::orderBy('name')->get(),
            'states'     => State::orderBy('name')->get(),
            'user'       => $user,
            'userPhones' => $user->phones()->get()->keyBy('type_id'),
        ]);
    }

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

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', exception_details($e));
        }
    }

    public function destroy(string $id)
    {
        try {
            User::withTrashed()->where('id', $id)->delete();

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.delete'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', exception_details($e));
        }
    }

    public function recover(string $id)
    {
        try {
            User::withTrashed()->where('id', $id)->update([
                'deleted_at' => null
            ]);

            return redirect()->route('administrator.users.index')
                ->with('success', trans('message_alert.success.recover'));

        } catch (\Exception $e) {

            Log::error(__CLASS__ . "::" . __FUNCTION__ . " " . exception_details($e));

            return redirect()->back()->withInput()->with('error', exception_details($e));
        }
    }
}
