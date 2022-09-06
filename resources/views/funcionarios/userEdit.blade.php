@extends('layouts.app')

@section('title','Editar Usuário')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				@if ($errors->any())
					<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
					</div>
				@endif
				<h1 class="display-6">Editar usuário</h1>
				<hr>
				<form action="{{ route('funcionarios-user-update', ['id'=>$users->id]) }}" method="POST">
				@csrf
				@method('PUT')
					<div class="form-group">
						<div class="form-group">
							<label for="nome">Nome: </label>
							<input type="text" class="form-control" value="{{ $users->name }}" name="nome" placeholder="Digite um nome">
						</div><br>
						<div class="form-group">
							<label for="email">E-mail: </label>
							<input type="text" class="form-control" value="{{ $users->email }}" name="email" placeholder="Digite o e-mail">
						</div><br>
						<div class="form-group">
							<label for="senha">Senha: </label>
							<input type="password" class="form-control" value="" name="password" placeholder="Confirme a sua senha">
							<small id="emailHelp" class="form-text text-muted">
								Para alterar a sua senha 
								<a href="{{ route('funcionarios-password-edit') }}" class="form-text text-primary">clique aqui.</a>
							</small>
						</div><br>
						<div class="row">
							<div class="">
								<a href="{{ route('funcionarios-index') }}" class="btn btn-danger col-sm-12 mb-2">Voltar</a>
								<input type="submit" class="btn btn-primary col-sm-12" value="Atualizar" name="submit">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection