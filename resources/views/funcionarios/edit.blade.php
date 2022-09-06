@extends('layouts.app')

@section('title','Edição')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<h1 class="display-6">Editar funcionário</h1>
				<hr>
				<form action="{{ route('funcionarios-update', ['id'=>$funcionarios->id]) }}" method="POST">
				@csrf
				@method('PUT')
					<div class="form-group">
						<div class="form-group">
							<label for="nome">Nome: </label>
							<input type="text" class="form-control" value="{{ $funcionarios->nome }}" name="nome" placeholder="Digite um nome">
						</div><br>
						<div class="form-group">
							<label for="endereco">Endereço: </label>
							<input type="text" class="form-control" value="{{ $funcionarios->endereco }}" name="endereco" placeholder="Digite o endereço do funcionario">
						</div><br>
						<div class="form-group">
							<label for="email">E-mail: </label>
							<input type="text" class="form-control" value="{{ $funcionarios->email }}" name="email" placeholder="Digite o e-mail">
						</div><br>
						<div class="form-group">
							<label for="telefone">Telefone: </label>
							<input type="number" class="form-control" value="{{ $funcionarios->telefone }}" name="telefone" placeholder="Digite o Telefone">
						</div><br>
						<div class="form-group">
							<label for="cpf">CPF: </label>
							<input type="number" class="form-control" value="{{ $funcionarios->cpf }}" name="cpf" placeholder="Digite o CPF">
						</div><br>
						<div class="form-group">
							<label for="data_nascimento">Data de Nascimento: </label>
							<input type="date" class="form-control" value="{{ $funcionarios->data_nascimento }}" name="data_nascimento" placeholder="Digite a data de nascimento">
						</div><br>
						<div class="row">
							<div>
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