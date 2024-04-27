<x-app-layout>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                @if (isset($product))
                    <p class="text-primary m-0 fw-bold">{{ trans('Update :name', ['name' => __('Product')]) }}</p>
                @else
                    <p class="text-primary m-0 fw-bold">{{ trans('Create :name', ['name' => __('Product')]) }}</p>
                @endif
            </div>
            <div class="card-body">
                @if (isset($product))
                    <form class="form p-4" action="{{ route('products.update', $product->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="name@example.com"
                                        value="{{ old('name', $product->name) }}" autocomplete="product">
                                    <label for="name">{{ __('Product') }}</label>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type=number step=0.01
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        name="price" placeholder="name@example.com"
                                        value="{{ old('price', $product->price) }}" autocomplete="product">
                                    <label for="price">{{ __('Price') }} $
                                    </label>
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Leave a comment here" rows=4 autocomplete="description">{{ old('description', $product->description) }}</textarea>
                                    <label for="description">{{ __('Description') }}</label>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 justify-content-center">
                                    <img id="imgPreview" class="rounded me-2 img-fluid"
                                        src={{ '/storage/uploads/images/products/' . $product->image }}>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('products.index') }}" class="btn btn-danger m-1">{{ __('Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary m-1">{{ trans('Update :name', ['name' => __('Product')]) }}</button>
                        </div>
                    </form>
                @else
                    <form class="form p-4" action="{{ route('products.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="name@example.com"
                                        value="{{ old('name') }}" autocomplete="product">
                                    <label for="name">{{ __('Product') }}</label>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type=number step=0.01
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        name="price" placeholder="name@example.com" value="{{ old('price') }}"
                                        autocomplete="product">
                                    <label for="price">{{ __('Price') }} $
                                    </label>
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Leave a comment here" rows="3" autocomplete="description">{{ old('description') }}</textarea>
                                    <label for="description">{{ __('Description') }}</label>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 justify-content-center">
                                    <img id="imgPreview" class="rounded me-2 img-fluid"
                                        src="/images/default_product.png">
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
                        <div class="d-flex flex-md-row justify-content-end">
                            <a href="{{ route('products.index') }}"
                                class="btn btn-danger m-1">{{ __('Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary m-1">{{ trans('Create :name', ['name' => __('Product')]) }}</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script type='module'>
            const image = document.getElementById("imgPreview");
            const inputImage = document.getElementById("image");
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
        </script>
    @endpush
</x-app-layout>
