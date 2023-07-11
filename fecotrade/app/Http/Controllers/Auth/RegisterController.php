<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'user_name'    => ['required', 'string', 'max:255', 'unique:users'],
             'sponsor'    => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

         /**
          * Create a new user instance after a valid registration.
          *
          * @param  array  $data
          * @return \App\User
          */
         protected function create(array $data)
         {
              $sponsor =  User::where('user_name','like', $data['sponsor'])->select('id','user_name')->first();
              if($sponsor != null)
              {
                  $sponsor_id = $sponsor->id;
              }else 
              {
                  $sponsor_id = 1;
              }
             $user = User::create([
                 'name'     => $data['name'],
                  'user_name'     => $data['user_name'],
                   'sponsor'     => $sponsor_id,
                 'email'    => $data['email'],
                 'password' => Hash::make($data['password']),
             ]);
             
             RoleUser::create([
                'user_id' => $user->id,
                'role_id' => 2
             ]);
             
             return $user;
         }
          public function getSponsor(Request $request)
    {
      //  dd($request);

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
}
