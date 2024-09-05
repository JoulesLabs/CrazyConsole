@extends('layouts.main')

@section('title', 'CrazyConsole | Dashboard')
@section('breadcrumbs')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('contents')
   <h1>My Admin</h1>
   <x-link.turbo class="name">Home</x-link.turbo>

@endsection

