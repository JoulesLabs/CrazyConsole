@extends('layouts.main')

@section('title', 'CrazyConsole | User Edit')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users_create') }}
@endsection

@section('contents')

        @include('users.partials.edit')

@endsection


