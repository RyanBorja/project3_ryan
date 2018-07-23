@extends('layouts.app')

@section('title')
    Add Flash Card
@endsection

@section('content')

	@if ($errors->any())
		<div class="alert alert-danger flash-card-width mb-3">
			<ul class="mb-0">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if (session('status'))
		<div class="alert alert-success flash-card-width mb-3" role="alert">
			{{ session('status') }}
		</div>
	@endif

	<div class="container">
    <div class="card mb-5">
		<div class="card-header">
			<h3 class="text-center">Add New Flash Card</h3>
		</div>
		<form class="" method="post" action="/flashcards">
		{{ csrf_field() }}
			<div class="form-group card-header">
				<label style="display:none;" for="term"></label>
				<input type="text" class="form-control newFCForm" name="flashcardTerm" id="term" placeholder="Term">
			</div>
			<div class="form-group card-body">
				<label style="display:none;" for="definition"></label>
				<textarea class="form-control newFCForm" id="definition" placeholder="Definition" name="flashcardDefinition" rows="3"></textarea>
			</div>
			<div class="card-footer mb-5">
				<button class="btn btn-block btn-primary" type="submit">Create</button>
			</div>
		</form>
		
	</div>
	</div>
	<div class="container pt-5">
		<br>
		<br>
		<display-flashcards :flashcards-data='{{ $flashcards->toJSON() }}'></display-flashcards>
	</div>
@endsection

