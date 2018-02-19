<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationEmail;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use Auth;

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
    protected $redirectTo = '/home';

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    /*    $input = $request->all();
        
                if ($validator->passes()) {
        
                    // Store your user in database 
        
                    return Response::json(['success' => '1']);
        
                }
                
                return Response::json(['errors' => $validator->errors()]);
                */
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
          	'activated' => '1'
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        Mail::to($user->email)->send(new ConfirmationEmail($user));
        
        return back()->with('status', 'На ваш email отправлен код верификации.Пожалуйста подтвердите аккаунт.');

        // $this->guard()->login($user);
        // return redirect($this->redirectPath());
    }

    //socialite redirect to provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    //handle callback returned from provider
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

//create user with socialite provied
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }

    public function confirmEmail($token)
    {
        User::where('email_token',$token)->firstOrFail()->confirmEmail();

        return redirect('/')->with('status', 'Вы успешно активировали свой аккаунт.');
    }

}
