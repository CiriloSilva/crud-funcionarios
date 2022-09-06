@extends('layouts.app')

@section('title','Sobre')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-sm-6">
			<h1 class="display-6">Objetivo</h1>
			<p class="display-1 fs-6 lh-sm" style="text-align: justify;">CRUD básico criado com o objetivo de demonstrar habilidades com as 4 operações básicas create, read, update e delete.</p>
			<p class="display-1 fs-6 lh-sm" style="text-align: justify;">Foram utilizados neste CRUD o framework PHP Laravel versão 8, em conjunto do framework web Bootstrap versão 5.</p>
		</div>
		<div class="col-sm-6">
			<h1 class="display-6">Conceito</h1>
			<p class="display-1 fs-6 lh-sm" style="text-align: justify;">FUN CAD é uma simulação de um sistema de cadastro de funcionários simples, com sistema de login, onde para cadastrar ou acessar é necessário estar logado.</p>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-sm-6">
			<h1 class="display-6">Laravel</h1>
			<p class="display-1 fs-6" style="text-align: justify;">Laravel é um framework PHP livre e open-source criado por Taylor B. Otwell para o desenvolvimento de sistemas web que utilizam o padrão MVC.</p>
		</div>
		<div class="col-sm-6">
			<h1 class="display-6">Bootstrap</h1>
			<p class="display-1 fs-6" style="text-align: justify;">Bootstrap é um framework web com código-fonte aberto para desenvolvimento de componentes de interface e front-end para sites e aplicações web, usando HTML, CSS e JavaScript, baseado em modelos de design para a tipografia, melhorando a experiência do usuário em um site amigável e responsivo.</p>
		</div>
	</div>
</div>

@endsection