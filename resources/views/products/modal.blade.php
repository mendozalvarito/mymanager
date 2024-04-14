<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titleModal"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form p-4" enctype="multipart/form-data" method="POST" id="formProduct">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-9">
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
                                <input type=number step=0.01 class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" placeholder="name@example.com"
                                    value="{{ old('price') }}" autocomplete="product">
                                <label for="price">{{ __('Price') }} $
                                </label>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Leave a comment here" rows="3" autocomplete="description"></textarea>
                                <label for="description">{{ __('Description') }}</label>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label for="image" class="input-group-text">{{ __('Image') }}</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <img id="imgPreview" class="rounded me-2 img-fluid">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="buttonModal"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function imageViewer() {
        return {
            imageUrl: '',

            fileChosen(event) {
                this.fileToDataUrl(event, src => this.imageUrl = src)
            },

            fileToDataUrl(event, callback) {
                if (!event.target.files.length) return

                let file = event.target.files[0],
                    reader = new FileReader()

                reader.readAsDataURL(file)
                reader.onload = e => callback(e.target.result)
            },
        }
    }
</script>
