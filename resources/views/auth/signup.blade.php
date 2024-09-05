@extends('layouts.auth')

@section('contents')
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-body-secondary">Create your account</p>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                    <input class="form-control" type="text" placeholder="Username">
                    <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                    <input class="form-control" type="password" placeholder="Password">
                    <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                    <input class="form-control" type="password" placeholder="Repeat password">
                    <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
                <button class="btn btn-block btn-success" type="button">Create Account</button>
                <x-link.turbo href="{{ route('auth.login') }}">Have you already an account? Login</x-link.turbo>

            </div>
        </div>
    </div>

@endsection
