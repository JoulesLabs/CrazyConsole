@extends('layouts.main')

@section('title', 'CrazyConsole | Users')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('contents')
    <x-turbo::frame id="user-index" data-controller="alert">
      <x-card>
        <x-slot:title>
            Users
        </x-slot:title>

          <table class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                  <tr @frameid($user)>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                          <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm" data-turbo-target="_top">Edit</a>
                          <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm"  data-turbo-confirm="Are you sure to delete user {{ $user->name }}?" data-turbo-method="delete" data-turbo-csrf-token="{{ csrf_token() }}" data-target="{{ frame($user) }}">Delete</a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>

      </x-card>

    </x-turbo::frame>
@endsection

