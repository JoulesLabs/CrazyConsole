<div id="user-create">
    <form action="{{ route('users.store') }}" method="post">
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" aria-label="First name">
            </div>
            <div class="col">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Last name">
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
                @csrf
                <button type="submit" class="btn btn-primary">Create</button>

            </div>
        </div>
    </form>
</div>
