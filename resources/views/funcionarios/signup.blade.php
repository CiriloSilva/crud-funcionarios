@extends('layouts.app')

@section('title','Cadastro')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<h1 class="display-6 text-center">Cadastro de Novo Usuário</h1>
				<hr>
				<form action="{{ route('funcionarios-login-store') }}" method="POST">
				@csrf
					<div class="form-group">
						<div class="form-group mb-2">
							<label for="nome">Nome: </label>
							<input type="text" class="form-control" name="name" placeholder="Digite um nome">
						</div>
						<div class="form-group mb-2">
							<label for="email">E-mail: </label>
							<input type="text" class="form-control" name="email" placeholder="Digite o e-mail">
						</div>
						<div class="form-group mb-4">
							<label for="senha">Senha: </label>
							<input type="password" class="form-control" name="password" placeholder="Digite uma Senha">
						</div>
						<div class="row">
							<div class="">
								<a href="{{ route('funcionarios-index') }}" class="btn btn-danger col-sm-12 mb-2">Voltar</a>
								<input type="submit" class="btn btn-primary col-sm-12" name="submit">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection