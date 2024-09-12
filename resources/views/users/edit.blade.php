@extends('layouts.main')

@section('title', 'CrazyConsole | User Edit')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users_edit') }}
@endsection

@section('contents')

        @include('users.partials.edit', ['abilities' => $abilities, 'selectedPermissions' => $user->abilities, 'user' => $user, 'roles' => $roles])

@endsection


