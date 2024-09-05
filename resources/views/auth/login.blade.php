@extends('layouts.auth')

@section('contents')
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-body-secondary">Sign In to your account</p>
                    @if (session('_status'))
                        @include('partials.alert', ['message' => session('_msg'), 'type' => 'danger', 'status' => session('_status')])
                    @endif
                    <form action="{{ route('auth.login') }}" method="post">
                        <div class="input-group mb-3"><span class="input-group-text">
                          <svg class="icon">
                            <use xlink:href="{{ asset('/assets/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                          </svg></span>
                            <input class="form-control" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text">
                          <svg class="icon">
                            <use xlink:href="{{ asset('/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                          </svg></span>
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="row">
                            @csrf
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                <x-link.turbo href="#" icon="cil-user">Click</x-link.turbo>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>Sign up</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <x-link.turbo href="{{ route('auth.signup.page') }}" class="btn btn-lg btn-outline-light mt-3">Register Now!</x-link.turbo>
                        <x-button.dark size="sm" type="submit">Save</x-button.dark>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
