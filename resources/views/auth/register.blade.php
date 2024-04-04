<x-guest-layout>
    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center">
        <x-app-logo/>
        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form mb-4">
            <h3 class="fw-bold mb-3">{{ __('Register') }}</h3>
            <!-- Register Form-->
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf
                <div class="form-group">
                    <label class="form-label @error('name') is-invalid @enderror" for="name">{{ __('Username') }}</label>
                    <input type="text" class="form-control" id="name"
                        placeholder="{{ __('Enter your username') }}" name="name" value="{{old('name')}}" required
                        autocomplete="username">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">{{ __('Email address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@email.com"
                        name="email" value="{{old('email')}}" required autocomplete="email" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        placeholder="{{ __('Enter your password') }}" required autocomplete="new-password"/>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                        placeholder="{{ __('Repeat your password') }}" required autocomplete="new-password"/>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 my-4">{{ __('Sign Up') }}</button>
            </form>
            <!-- / Register Form-->

            <p class="d-block text-center text-muted small">{{ __('Already registered?') }} <a
                    class="text-muted text-decoration-underline" href="{{ route('login') }}">{{ __('Login') }}</a>
            </p>
        </div>
    </div>
    <!-- / Login Form-->
</x-guest-layout>
