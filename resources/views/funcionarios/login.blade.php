@extends('layouts.app')

@section('title','Login')

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
				<h1 class="display-6 text-center">Login</h1>
				<hr>
				<form action="{{ route('funcionarios-login-auth') }}" method="POST">
				@csrf
					<div class="form-group mb-2">
						<label>E-mail:</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group mb-3">
						<label type="password" name="password">Senha:</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="row">
						<div>
							<button type="submit" class="btn btn-primary col-sm-12">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection