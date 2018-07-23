@extends('layouts.app')

@section('title')
	Edit Flash Card
@endsection

@section('content')

	<form method="post" action="/flashcards/{{ $flashcard->id }}">
		@csrf
		{{ method_field('PATCH') }}

		<div class="form-group">
			<label for="term">Flash Card Term</label>
			<input type="text" class="form-control" name="flashcardTerm" id="term" value="{{ $flashcard->term }}">
		</div>

		<div class="form-group">
			<label for="definition">Flash Card Definition</label>
			<textarea class="form-control" id="definition" name="flashcardDefinition" rows="3">{{ $flashcard->definition }}</textarea>
		</div>

		<button class="btn btn-primary float-right" type="submit">Save</button>

	</form>

@endsection