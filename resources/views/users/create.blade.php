@extends('layouts.main')

@section('title', 'CrazyConsole | User Create')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users_create') }}
@endsection

@section('contents')

    <x-card>
        <x-slot:title>
            User Create
        </x-slot:title>

        @include('users.partials.create')
    </x-card>

    <x-input.radio name="name" label="Accept" />

    <div class="btn-group" role="group" aria-label="Basic example">
        <input class="btn-check" id="btn-check-1" type="radio" autocomplete="off"  name="deny">
        <label class="btn btn-danger" for="btn-check-1">Deny</label>

        <input class="btn-check" id="btn-check-2" type="radio"  autocomplete="off"  name="default">
        <label class="btn btn-primary" for="btn-check-2">Default</label>

        <input class="btn-check" id="btn-check-3" type="radio"  autocomplete="off"  name="allow">
        <label class="btn btn-success" for="btn-check-3">Allow</label>
    </div>
@endsection


