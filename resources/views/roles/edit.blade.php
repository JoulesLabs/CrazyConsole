@extends('layouts.main')

@section('title', 'CrazyConsole | Role Edit')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles_edit') }}
@endsection

@section('contents')

        @include('roles.partials.create', ['action' => 'update', 'selectedPermissions' => $role->permission_array])

@endsection


