<x-app-layout>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                @if (isset($customer))
                    <p class="text-primary m-0 fw-bold">{{ trans('Update :name', ['name' => __('Customer')]) }}</p>
                @else
                    <p class="text-primary m-0 fw-bold">{{ trans('Create :name', ['name' => __('Customer')]) }}</p>
                @endif
            </div>
            <div class="card-body">
                @if (isset($customer))
                    <form class="form p-4" action="{{ route('customers.update', $customer->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                class="form-control @error('identity_card') is-invalid @enderror"
                                                id="identity_card" name="identity_card"
                                                placeholder="{{ __('Identity card') }}"
                                                value="{{ old('identity_card') }}" autocomplete="identity_card"
                                                aria-describedby="button-search">
                                            <button type="button" class="btn btn-primary" id="button-search">
                                                <i class="fas fa-search m-1"></i>
                                                {{ __('Search') }}
                                            </button>
                                            @error('identity_card')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" placeholder="first_name"
                                                value="{{ old('first_name') }}" autocomplete="first_name">
                                            <label for="first_name">{{ __('First name') }}</label>
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type=text
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="last_name" name="last_name" placeholder="last_name"
                                                value="{{ old('last_name') }}" autocomplete="lastname">
                                            <label for="last_name">{{ __('Last name') }}
                                            </label>
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                id="gender" name="gender">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label for="gender">{{ __('Gender') }}
                                            </label>
                                            @error('gender')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type=date
                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                id="birthdate" name="birthdate" placeholder="name@example.com"
                                                value="{{ old('birthdate') }}" autocomplete="birthdate">
                                            <label for="birthdate">{{ __('Birthdate') }}
                                            </label>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('nationality') is-invalid @enderror"
                                                id="nationality" name="nationality">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label for="nationality">{{ __('Nationality') }}
                                            </label>
                                            @error('nationality')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Leave a comment here" rows="3" autocomplete="address">{{ old('address') }}</textarea>
                                            <label for="address">{{ __('Address') }}</label>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="email" value="{{ old('email') }}"
                                                autocomplete="email">
                                            <label for="email">{{ __('Email') }}</label>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                id="mobile" name="mobile" placeholder="mobile"
                                                value="{{ old('mobile') }}" autocomplete="mobile">
                                            <label for="mobile">{{ __('Mobile number') }}</label>
                                            @error('mobile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <img id="imgPreview" class="rounded me-2 img-fluid"
                                        src="/images/user/default.jpg">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('customers.index') }}"
                                class="btn btn-danger m-1">{{ __('Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary m-1">{{ trans('Update :name', ['name' => __('Customer')]) }}</button>
                        </div>
                    </form>
                @else
                    <form class="form p-4" action="{{ route('customers.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <h5>{{ __('Personal information') }}</h5>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                class="form-control @error('identity_card') is-invalid @enderror"
                                                id="identity_card" name="identity_card"
                                                placeholder="{{ __('Identity card') }}"
                                                value="{{ old('identity_card') }}" autocomplete="identity_card"
                                                aria-describedby="button-search">
                                            <button type="button" class="btn btn-primary" id="button-search">
                                                <i class="fas fa-search m-1"></i>
                                                {{ __('Search') }}
                                            </button>
                                            @error('identity_card')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" placeholder="first_name"
                                                value="{{ old('first_name') }}" autocomplete="first_name">
                                            <label for="first_name">{{ __('First name') }}</label>
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type=text
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="last_name" name="last_name" placeholder="last_name"
                                                value="{{ old('last_name') }}" autocomplete="lastname">
                                            <label for="last_name">{{ __('Last name') }}
                                            </label>
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                id="gender" name="gender">
                                                @foreach (\App\Enums\Gender::cases() as $gender)
                                                    <option value="{{ $gender->name }}">
                                                        {{ $gender->value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="gender">{{ __('Gender') }}
                                            </label>
                                            @error('gender')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type=date
                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                id="birthdate" name="birthdate" placeholder="name@example.com"
                                                value="{{ old('birthdate') }}" autocomplete="birthdate">
                                            <label for="birthdate">{{ __('Birthdate') }}
                                            </label>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('nationality') is-invalid @enderror"
                                                id="nationality" name="nationality">
                                                <option value="None" calling="000" selected>
                                                    {{ trans('Select a :name', ['name' => __('country')]) }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country['name'] }}"
                                                        calling="{{ $country['calling_code'] }}">
                                                        {{ __($country['name']) }}</option>
                                                @endforeach
                                            </select>
                                            <label for="nationality">{{ __('Nationality') }}
                                            </label>
                                            @error('nationality')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Leave a comment here" rows="3" autocomplete="address">{{ old('address') }}</textarea>
                                            <label for="address">{{ __('Address') }}</label>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="email"
                                                value="{{ old('email') }}" autocomplete="email">
                                            <label for="email">{{ __('Email') }}</label>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                id="mobile" name="mobile" placeholder="mobile"
                                                value="{{ old('mobile') }}" autocomplete="mobile">
                                            <label for="mobile">{{ __('Mobile number') }}</label>
                                            @error('mobile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <img id="imgPreview" class="rounded me-2 img-fluid"
                                        src="/images/user/default.jpg">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('customers.index') }}"
                                class="btn btn-danger m-1">{{ __('Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary m-1">{{ trans('Create :name', ['name' => __('Customer')]) }}</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script type='module'>
            const selectNationality = document.getElementById("nationality");
            const image = document.getElementById("imgPreview");
            const inputImage = document.getElementById("image");
            const inputMobile = document.getElementById("mobile");
            const previewImage = () => {
                const file = inputImage.files;
                if (file) {
                    const fileReader = new FileReader();
                    fileReader.onload = function(event) {
                        image.src = event.target.result;
                    };
                    fileReader.readAsDataURL(file[0]);
                }
            };
            inputImage.addEventListener('change', previewImage);
            selectNationality.addEventListener('change', function() {
                inputMobile.value = '+' + selectNationality.options[selectNationality.selectedIndex].getAttribute(
                    'calling');
            });
        </script>
    @endpush
</x-app-layout>
