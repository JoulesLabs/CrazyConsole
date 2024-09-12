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

        @include('users.partials.create', ['roles' => $roles])
    </x-card>

@endsection


@push('scripts')

@endpush

