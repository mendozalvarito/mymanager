<x-init-layout>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">{{ __('Welcome Back!') }}</h4>
                                    </div>
                                    <form class="user needs-validation" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text"
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                id="name" aria-describedby="nameHelp" name="name" value="{{ old('name') }}"
                                                placeholder="{{ __('User') }}" required autocomplete="username">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="{{ __('Password') }}"
                                                required autocomplete="current-password">
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="form-check-input custom-control-input" id="remember_me"
                                                    name="remember">
                                                <label class="custom-control-label"
                                                    for="remember_me">{{ __('Remember me') }}</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user d-block w-100">
                                            {{ __('Login') }}
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small"
                                            href="{{route('password.request')}}">{{ __('Forgot your password?') }}</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register')}}">{{ __('Create an account!') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-init-layout>
