<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FuncionariosController extends Controller
{   
    public function index(){
        if(Auth::check() === true){
            $funcionarios = Funcionario::all();
            $users = Auth::user();
            return view('funcionarios.index', ['funcionarios' => $funcionarios],['name' => $users['name']]);
            
        }else{
            return redirect()->route('funcionarios-login');
        }        
    }
    public function create(){
        $users = Auth::user();
        return view('funcionarios.create',['name' => $users['name']]);
    }
    public function store(Request $request){
        Funcionario::create($request->all());
        return redirect()->route('funcionarios-index');
    }
    public function edit($id){
        $users = Auth::user();
        $funcionarios = Funcionario::where('id', $id)->first();
        if(!empty($funcionarios)){
            return view('funcionarios.edit', ['funcionarios'=>$funcionarios],['name' => $users['name']]);
        }
        else{
            return redirect()->route('funcionarios-index');
        }

    }
    public function update(Request $request, $id){
        $data = [
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
        ];
        Funcionario::where('id', $id)->update($data);
        return redirect()->route('funcionarios-index');
    }
    public function destroy($id){
        Funcionario::where('id', $id)->delete();
        return redirect()->route('funcionarios-index');
    }
    public function sobre(){
        $users = Auth::user();
        return view('funcionarios.sobre',['name' => $users['name']]);
    }
    public function busca(Request $request){
        $users = Auth::user();
        $buscar_texto = $request->input('consulta');
        $funcionarios = Funcionario::where('nome','LIKE', '%'.$buscar_texto.'%')->get();
        return view('funcionarios.busca', compact('funcionarios'),['name' => $users['name']]);
    }
    public function login(){
        return view('funcionarios.login',['name' => null]);
    }
    public function auth(Request $request){
        $dados_login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($dados_login)){
            return redirect()->route('funcionarios-index');    
        }
        return redirect()->back()->withInput()->withErrors(['O e-mail ou senha informados são inválidos!']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('funcionarios-index');
    }
    public function signup(){
        return view('funcionarios.signup',['name' => null]);
    }
    public function signup_store(Request $request){
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('funcionarios-index');
    }
    public function user_edit(){
        $users = Auth::user();
        $id = $users['id'];
        $usuarios = User::where('id', $id)->first();
        if(!empty($usuarios)){
            return view('funcionarios.userEdit', ['users'=>$usuarios],['name' => $users['name']]);
        }
        else{
            return redirect()->route('funcionarios-index');
        }

    }
    public function user_update(Request $request){
        $data = [
            'password' => $request->password
        ];
        $user = Auth::user();
        $id = $user['id'];
        if(Hash::check($data['password'], $user['password'])){
            $data = [
                'name' => $request->nome,
                'email' => $request->email,
            ];
            User::where('id', $id)->update($data);
            return redirect()->route('funcionarios-index');
        }else{
            return redirect()->back()->withInput()->withErrors(['A senha informada está incorreta!']);
        }
    }
    public function password_edit(){
        $users = Auth::user();
        $id = $users['id'];
        $usuarios = User::where('id', $id)->first();
        if(!empty($usuarios)){
            return view('funcionarios.userPassword', ['users'=>$usuarios],['name' => $users['name']]);
        }
        else{
            return redirect()->route('funcionarios-index');
        }

    }
    public function password_update(Request $request){
        $data = [
            'oldPassword' => $request->oldPassword
        ];
        $user = Auth::user();
        $id = $user['id'];
        if(Hash::check($data['oldPassword'], $user['password'])){
            $data = [
                'password' => bcrypt($request['newPassword'])
            ];
            User::where('id', $id)->update($data);
            return redirect()->route('funcionarios-index');
        }else{
            return redirect()->back()->withInput()->withErrors(['A senha informada está incorreta!']);
        }
    }
}
