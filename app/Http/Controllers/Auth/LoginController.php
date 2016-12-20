<?php

namespace ZarbTest\Http\Controllers\Auth;

use ZarbTest\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

use ZarbTest\Repositories\UserRepository;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    private $__success;

    private static $__title = 'Login';

    private static $__error = 'O email e a senha que você digitou não coincidem.';

    private $__user_repository;

    public function __construct(UserRepository $user_repository){

        $this->middleware('guest', ['except' => 'logout']);

        $this->__success         = 'Seja bem vindo %s, seu login foi realizado com sucesso.';
        $this->__user_repository = $user_repository;
    }

    public function index(){

        $data = [
            'title' => SELF::$__title
        ];

        return view('login.index', ['data' => $data]);
    }

    public function login(Request $request){

        $remember = ($request->has('remember')) ? true : false;

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1], $remember)){
            $user = $this->__user_repository->findBy('email', $request->get('email'));
            $msg  = printf($this->__success, $user->full_name);
            return redirect('dashboard')->with('login', $msg);
        }

        return redirect()->back()->with('global', SELF::$__error);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
