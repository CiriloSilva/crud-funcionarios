@extends('layouts.app')

@section('title','Editar Senha')

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
				<h1 class="display-6">Alterar senha</h1>
				<hr>
				<form action="{{ route('funcionarios-password-update', ['id'=>$users->id]) }}" method="POST">
				@csrf
				@method('PUT')
					<div class="form-group">
						<div class="form-group">
							<label for="senha antiga">Senha antiga: </label>
							<input type="password" class="form-control" value="" name="oldPassword" placeholder="Digite a senha antiga">
						</div><br>
						<div class="form-group">
							<label for="senha nova">Senha nova: </label>
							<input type="password" class="form-control" value="" name="newPassword" placeholder="Digite a nova senha">
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