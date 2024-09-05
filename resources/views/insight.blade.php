@extends('layouts.main')

@section('title', 'CrazyConsole | Insight')
@section('breadcrumbs')
    {{ Breadcrumbs::render('insight') }}
@endsection

@section('contents')
   <h1>Insightful - {{ session('_status') }}</h1>

   <div data-controller="hello">
       <input data-hello-target="name" type="text">
       <button data-action="click->hello#greet">Greet</button>
   </div>

@endsection

