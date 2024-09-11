@php
$_action = $action ?? 'create';
$_method = $_action == 'update' ? 'put' : 'post';
$_route_params = [];

if ($_action == 'update' && isset($role)) {
    $_route_params = ['id' => $role->id];
}

@endphp
<div id="role-{{ $_action }}" data-controller="permission">
    <x-card>
        <x-slot:title>
            Role {{ ucfirst($_action) }}
        </x-slot:title>

        <form action="{{ route('roles.' . ($_action == 'create' ? 'store' : 'update'), $_route_params) }}" method="post">

            <x-input name="role_name" label="Name" value="{{ isset($role) ? $role->role_name : '' }}" />
            @csrf

            <br/>

            @include('roles.partials.permission-btn-group')
            <br>
            <br>

            <hr>

            @include('roles.partials.persmissions')
            @if($_action == 'update')
                @method('put')
            @endif
            <hr>
            <x-button.primary type="submit">{{ ucfirst($_action) }}</x-button.primary>
        </form>
    </x-card>
</div>
