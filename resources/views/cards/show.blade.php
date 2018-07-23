@extends('layouts.app')

@section('title')
    Add Flash Card
@endsection

@section('content')

    <quiz :flashcards-data='{{ $flashcards->toJSON() }}'></quiz>

@endsection