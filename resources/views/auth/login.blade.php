<x-guest-layout>
    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center">
        <x-app-logo />
        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form">
            <h3 class="fw-bold">{{ __('Login') }}</h3>
            <p class="text-muted">{{ __('Welcome back!') }}</p>

            <!-- Login Form-->
            <form class="mt-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">{{ __('Username') }}</label>
                    <input id="name" type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Enter your username') }}" value="{{old('name')}}" required
                        autocomplete="username" />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label d-flex justify-content-between align-items-center">
                        {{ __('Password') }}
                        <a href="{{ route('password.request') }}"
                            class="text-muted small ms-2 text-decoration-underline">{{ __('Forgotten password?') }}</a>
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder=" {{ __('Enter your password') }}" required
                        autocomplete="current-password" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 my-4">{{ __('Login') }}</button>
            </form>
            <!-- / Login Form -->

            <p class="d-block text-center text-muted small">{{ __('Are new user?') }}
                <a class="text-muted text-decoration-underline"
                    href="{{ route('register') }}">{{ __('Sign up for an account') }}</a>
            </p>
        </div>
    </div>
    <!-- / Login Form-->
</x-guest-layout>
