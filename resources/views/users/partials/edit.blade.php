@php
    $userRole = $user->roles->pluck('id')->toArray();
@endphp
<x-turbo::frame id="user-update" target="_top">
    <x-card>
        <x-slot:title>
            {{ $user->name }} - Edit
        </x-slot:title>

        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" data-turbo-action="advance">
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" aria-label="name" value="{{ $user->name }}">
                </div>
                <div class="col">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="First name">
                </div>
                <div class="col">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Last name">
                </div>
            </div>

            <div class="row mt-4" data-controller="select2">
                <div class="col">
                    <label for="" class="form-label">Roles</label>
                    <select class="form-select form-select-sm select2-tags" name="roles[]" multiple aria-label="Default select example">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->id, $userRole) ? 'selected': '' }}>{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br/>

            @include('roles.partials.permission-btn-group')
            <br>
            <br>

            <hr>

            @include('roles.partials.persmissions')

            <hr>

            <div class="row mt-4">
                <div class="col" style="text-align: right;">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    @csrf
                    @method('PUT')
                    <x-button.primary type="submit">Update</x-button.primary>
                </div>
            </div>

        </form>
    </x-card>
</x-turbo::frame>
