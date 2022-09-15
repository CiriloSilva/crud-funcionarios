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
        // Verifica se o usuário está logado para entrar na aplicação e retorna a view index com jogos os funcionários, caso não esteja logado, redireciona para a página de login.

        if(Auth::check() === true){
            $funcionarios = Funcionario::all();
            $users = Auth::user();
            return view('funcionarios.index', ['funcionarios' => $funcionarios],['name' => $users['name']]);
            
        }else{
            return redirect()->route('funcionarios-login');
        }        
    }
    public function create(){
        // Retorna a view de cadastro de funcionarios.

        $users = Auth::user();
        return view('funcionarios.create',['name' => $users['name']]);
    }
    public function store(Request $request){
        // Recebe os dados, cria no banco o funcionário e retorna para a view index.

        Funcionario::create($request->all());
        return redirect()->route('funcionarios-index');
    }
    public function edit($id){
        // Retorna a view de edição de funcionarios, passando e localizando o funcionario pelo id, caso não exista o funcionário retorna a index.

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
        // Pega os dados do formulário, ataliza no banco com base no id e retorna a view index.

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
        // Deleta o funcionário com base no id e retorna a index.

        Funcionario::where('id', $id)->delete();
        return redirect()->route('funcionarios-index');
    }
    public function sobre(){
        // Verifica se o usuário está logado para entrar na aplicação e retorna a view de sobre/mais detalhes, caso não esteja logado redireciona para a pádina de login.

        if(Auth::check() === true){
            $users = Auth::user();
            return view('funcionarios.sobre',['name' => $users['name']]);
            
        }else{
            return redirect()->route('funcionarios-login');
        } 
    }
    public function busca(Request $request){
        // Recebe a string digitada pelo usuário, busca no banco um funcionário que tenha essa string em alguma parte do seu nome e então retorna a view de buscar com os resultados da busca.

        $users = Auth::user();
        $buscar_texto = $request->input('consulta');
        $funcionarios = Funcionario::where('nome','LIKE', '%'.$buscar_texto.'%')->get();
        return view('funcionarios.busca', compact('funcionarios'),['name' => $users['name']]);
    }
    public function login(){
        // Retorna a view de login.

        return view('funcionarios.login',['name' => null]);
    }
    public function auth(Request $request){
        // Recebe o email e senha digitados, tenta realizar a autenticação da sessão e retorna a view index, caso ocorra um erro, redireciona de volta para a view login com uma mensagem de erro.

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
        // Realiza a saida da sessão do usuário e retorna a view de login.

        Auth::logout();
        return redirect()->route('funcionarios-login');
    }
    public function signup(){
        // Retorna a view de cadastro de usuários.

        return view('funcionarios.signup',['name' => null]);
    }
    public function signup_store(Request $request){
        // Recebe os dados do formulário de cadastro de usuário, realiza o hash da senha, cria o usuário no banco e retorna a view index.

        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('funcionarios-index');
    }
    public function user_edit(){
        // Verifica se o usuário está logado para entrar na aplicação, pega o id do usuário, então procura o primeiro usuário com esta id e retorna a view de ediar usuário passando o usuário encontrado, caso não encontre retorna a view index.

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
        // Recebe os dados do formulário de atualizar usuário, realiza a autenticação do usuário, pega o id do usuário, verifica se a senha digitada pelo usuário é a senha correta via hash, procura o primeiro usuário cadastrado pelo id, realiza a atualização do nome e email e retorna a view index, caso a senha esteja incorrena redireciona de volta para a mesma view com uma mensagem de erro.

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
        // Verifica se o usuário está logado para entrar na aplicação, pega o id do usuário, então procura o primeiro usuário com esta id e retorna a view de ediar senha do usuário passando o usuário encontrado, caso não encontre retorna a view index.

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
        // Recebe os dados digitados no formulário, realiza a autenticação do usuário, pega o id do usuário, verifica se a senha digitada pelo usuário é a senha correta via hash, realiza o hash da nova senha digitada, procura o primeiro usuário cadastrado pelo id, atuliza a senha no banco, retorna a view index, caso a senha digitada esteja incorreta, retorna a mesma view com uma mensagem de erro.
        

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
