@extends('layouts.app')

@section('title','Cadastro Funcionário')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<h1 class="display-6 text-center">Cadastro de Novo Funcionário</h1>
				<hr>
				<form action="{{ route('funcionarios-store') }}" method="POST">
				@csrf
					<div class="form-group">
						<div class="form-group">
							<label for="nome">Nome: </label>
							<input type="text" class="form-control" name="nome" placeholder="Digite um nome">
						</div><br>
						<div class="form-group">
							<label for="endereco">Endereço: </label>
							<input type="text" class="form-control" name="endereco" placeholder="Digite o endereço">
						</div><br>
						<div class="form-group">
							<label for="email">E-mail: </label>
							<input type="text" class="form-control" name="email" placeholder="Digite o e-mail">
						</div><br>
						<div class="form-group">
							<label for="telefone">Telefone: </label>
							<input type="number" class="form-control" name="telefone" placeholder="Digite o Telefone">
						</div><br>
						<div class="form-group">
							<label for="cpf">CPF: </label>
							<input type="number" class="form-control" name="cpf" placeholder="Digite o CPF">
						</div><br>
						<div class="form-group">
							<label for="data_nascimento">Data de Nascimento: </label>
							<input type="date" class="form-control" name="data_nascimento" placeholder="Digite a data de nascimento">
						</div><br>
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