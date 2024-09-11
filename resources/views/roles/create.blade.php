@extends('layouts.main')

@section('title', 'CrazyConsole | Role Create')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles_create') }}
@endsection

@section('contents')
    @include('roles.partials.create')

@endsection


