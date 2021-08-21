<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\ORM\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

    private $messages = [     
        'name.required'         => 'O campo Nome Completo é obrigatório!',     
        'name.min'              => 'O campo Nome Completo deve conter no mínimo 3 letras!',     
        'name.max'              => 'O campo Nome Completo deve conter no máximo 50 letras!',   
        'email.required'        => 'O campo E-mail é obrigatório!',     
        'email.email'           => 'O campo E-mail deve conter um formato válido!',     
        'email.max'             => 'O campo E-mail deve conter no máximo 50 letras!',  
        'email.unique'          => 'Já existe esse e-mail cadastrado, favor recupere a conta ou utilize outro!',   
        'password.required'     => 'O campo Senha é obrigatório!',     
        'password.min'          => 'O campo Senha deve conter no mínimo 8 letras/números/simbolos!',  
        'password.confirmed'    => 'É obrigatório confirmar a senha!',   
        'city.required'         => 'O campo Cidade é obrigatório',     
        'city.min'              => 'O campo Cidade deve conter no mínimo 3 letras!',  
        'contact.regex'         => 'O campo Telefone ou Celular deve conter um formato válido!',  
    ];

    private $rules = [
        'name'              => 'required|min:10|max:50',
        'email'             => 'required|email|max:50|unique:users',
        'password'          => 'required|min:8|confirmed',
        'city'              => 'required|min:3',
        'contact'           => 'regex:/(01)[0-9]{9}/'
    ];

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
    protected function validator(Request $data, string $typeUser = 'common')
    {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function showRegistrationCommonForm()
    {
        return view('site.pages.auth.register');
    }

    public function registerCommon(Request $request)
    {
        $this->validator($request->all(), 'common');


        $data = $request->validate();
        dd('$data');




        $validateCity = $this->validateCity($data['city']);


        //- city vira -> city_id

        // disparar evento para e-mail

        //- id
        //- name
        //- email
        //- email_verified_at
        //- password
        //- contact 
        //- city_id
        //- site
        //- profile_photo
        //- approved
        //- timestamp

        try {

            $created = User::create( $isSupplier );


            $this->companyUtilized(false);

            return response()->json([
                'status' => true,
                'id' => $client->id,
                'name' => "{$client->person->name} {$client->person->doc} ({$client->headquarters->uf_city})",
            ]);

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => trans('message_alert.error.create'),
            ]);
        }


        var_dump($validate->messages());

        
        dd('oibb1');

    }


    public function registerPartner(Request $request)
    {

        try {

            DB::beginTransaction();

            $client = $this->createClient( $isSupplier );

            $this->createPerson($client, $request);

            $this->createLocationClient($client, $location);

            $this->createContactClientOrSupplier($client, $contact);

            DB::commit();

            $this->companyUtilized(false);

            return response()->json([
                'status' => true,
                'id' => $client->id,
                'name' => "{$client->person->name} {$client->person->doc} ({$client->headquarters->uf_city})",
            ]);

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => trans('message_alert.error.create'),
            ]);
        }

    }

    private function validateCity( $city )
    {
        $city_id = City::select('id')->where("name_visible", "LIKE", "%{$city}%")->first();

        return $city_id;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
