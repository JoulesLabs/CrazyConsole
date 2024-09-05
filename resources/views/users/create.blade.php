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

    <x-accordion id="a1">
        <x-accordion.item identifier="item1" parent-id="a1">
            <x-slot:title>
                Accordion Item 1
            </x-slot:title>
            <p>
                Accordion Item 1 Content
            </p>
        </x-accordion.item>

        <x-accordion.item identifier="item2" parent-id="a1">
            <x-slot:title>
                Accordion Item 2
            </x-slot:title>
            <p>
                Accordion Item 2 Content
            </p>
        </x-accordion.item>
    </x-accordion>

@endsection


