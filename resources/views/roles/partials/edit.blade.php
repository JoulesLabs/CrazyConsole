<div id="user-update">
    <form action="{{ route('users.update') }}" method="post" data-turbo-action="advance">
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
        <div class="row mt-4">
            <div class="col" style="text-align: right;">
                <input type="hidden" name="id" value="{{ $user->id }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Update</button>
                <x-link.turbo href="{{ route('users.index') }}" :data-turbo="['id'=> 3]">Cancel</x-link.turbo>
            </div>
        </div>
    </form>
</div>
