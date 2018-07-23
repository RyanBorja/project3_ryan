@extends('layouts.app')

@section('content')    
    <div class="text-center">
        <div class="row justify-content-center mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Edit Flash Cards</h1>
                    <h3 class="card-text"><a class="btn btn-lg btn-primary" href="/flashcards">Edit, Add, and Delete Flash Cards Here!</a></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Quiz Yourself</h1>
                    <h3 class="card-text"><a class="btn btn-lg btn-success" href="/quiz">Quiz Yourself Using Your Flash Cards!</a></h3>
                </div>
            </div>
        </div>
    </div>
@endsection