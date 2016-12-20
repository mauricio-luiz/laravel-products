<?php

namespace ZarbTest\Http\Controllers\Auth;

use ZarbTest\User;
use Validator;
use ZarbTest\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use ZarbTest\Repositories\UserRepository;

use ZarbTest\Http\Requests\RegisterPostRequest;
use Hash;
use DB;

class RegisterController extends Controller
{
    use RegistersUsers;

    private $__user_repository;

    private static $__title          = 'Criar conta';

    private static $__success        = 'Usuário criado com sucesso!';

    private static $__error          = 'Ocorreu um erro ao salvar!';

    private static $__default_active = 1;

    public function __construct(UserRepository $user_repository){
        $this->middleware('guest');
        $this->__user_repository = $user_repository;
    }

    public function index(){

        $data = [
            'title' => SELF::$__title
        ];

        return view('register.index', ['data' => $data]);
    }

    public function store(RegisterPostRequest $request){

        $data = [
            'full_name' => $request->input('nome_completo'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('senha')),
            'active'    => SELF::$__default_active
        ];

        //try{
            $this->__user_repository->create($data);
            return redirect()->route('home')->with('success', SELF::$__success);
        //}catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', SELF::$__error);
        //}
    }
}
