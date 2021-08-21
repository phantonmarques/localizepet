<?php

namespace App\Http\Controllers\Panel\Administrator;

use App\Http\Controllers\Controller;
use App\ORM\User\User;
use App\ORM\Auth\Role;
use App\ORM\Location\City;
use App\ORM\Location\State;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        // die('oi safado');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = null)
    {
        $users = User::orderBy('name', 'ASC');

        if ($filter === 'trashed')
            $users = $users->onlyTrashed()->get();
        else
            $users = $users->get();

        return view( 'panel.pages.administrator.users.list' )->with([ 'users' => $users ]);
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
        $roles = Role::orderBy('name', 'ASC')->get();
        $states = State::orderBy('name_visible', 'ASC')->get();

        return view( 'panel.pages.administrator.users.create' )->with([ 'roles' => $roles, 'states' => $states ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view( 'panel.pages.administrator.users.show' )->with([ 'user' => $user ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        die('editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
