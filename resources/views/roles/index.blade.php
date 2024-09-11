@extends('layouts.main')

@section('title', 'CrazyConsole | Roles')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('contents')
    <div id="role-index" data-controller="alert">
        <x-card>
            <x-slot:title>
                Roles
            </x-slot:title>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr id="role-{{ $role->id }}">
                        <td>{{ $role->role_name }}</td>
                        <td>
                            <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-primary btn-sm" data-turbo-target="_top">Edit</a>
                            <a href="{{ route('roles.delete', ['id' => $role->id]) }}" class="btn btn-danger btn-sm"  data-turbo-confirm="Are you sure to delete role {{ $role->role_name }}?" data-turbo-method="delete" data-turbo-csrf-token="{{ csrf_token() }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </x-card>

    </div>
@endsection

