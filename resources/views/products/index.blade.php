<x-app-layout>
    <div class="container-fluid">
        @session('success')
            <div data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="alert alert-success" id="myAlert">
                    {{ __($value) }}
                </div>
            </div>
        @endsession
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">{{ trans('Manage :name', ['name' => __('Products')]) }}</p>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" id="create">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
                        </button>
                    </div>
                </div>
                @isset($products)
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table table-hover my-0 align-middle" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-bg-primary">{{ __('Product') }}</th>
                                    <th class="text-bg-primary">{{ __('Description') }}</th>
                                    <th class="text-bg-primary text-center">{{ __('Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->isEmpty())
                                    <tr>
                                        <td colspan="3">
                                            <p class="text-center">{{ __('No records found') }}</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img class="rounded me-2" width="50" height="50"
                                                    src="/storage/uploads/images/products/{{ $product->image }}">{{ $product->name }}
                                            </td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <div class="m-2 text-center">
                                                    <div class="dropdown no-arrow">
                                                        <button
                                                            class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button type="button" id="update {{ $product->id }}"
                                                                    class="dropdown-item text-primary">
                                                                    <i class="fas fa-edit"></i> {{ __('Update') }}
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item text-primary">
                                                                        <i class="fas fa-trash"></i> {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                @endisset
                <div class="row">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="modal">
        @include('products.modal')
    </x-slot>
    @push('scripts')
        <script type="module">
            const myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
            const form = document.getElementById("formProduct");
            const name = document.getElementById("name");
            const description = document.getElementById("description");
            const image = document.getElementById("imgPreview");
            const inputMethod = document.createElement('input');
            const title = document.getElementById('titleModal');
            const button = document.getElementById('buttonModal');
            inputMethod.type = 'hidden';
            inputMethod.name = '_method';
            inputMethod.value = 'put';
            inputMethod.id = 'inputUpdate';

            function update(id) {
                let routeEdit = "{{ route('products.edit', ':id') }}";
                let routeUpdate = "{{ route('products.update', ':id') }}";
                let uri = routeEdit.replace(":id", id);

                fetch(uri)
                    .then((response) => response.json()) // convertir a json
                    .then((data) => {
                        name.value = data.name;
                        description.value = data.description;
                        image.src = "/storage/uploads/images/products/" + data.image;
                        form.action = routeUpdate.replace(":id", id);
                        form.appendChild(inputMethod);
                        title.innerHTML = "{{ trans('Update :name', ['name' => __('Product')]) }}";
                        button.innerHTML = "{{ __('Update') }}";
                        myModal.show();
                    }) //imprimir los datos en la consola
                    .catch((err) => console.log(err)); // Capturar errores
            }

            function crear() {
                form.reset();
                form.action = "{{ route('products.store') }}";
                title.innerHTML = "{{ trans('Create :name', ['name' => __('Product')]) }}";
                button.innerHTML = "{{ __('Create') }}";
                if (document.getElementById('inputUpdate') !== null) {
                    form.removeChild(inputMethod);
                }
                myModal.show();
            }

            const buttons = document.querySelectorAll("button[id^='update']");
            buttons.forEach(button => {
                const idButton = button.getAttribute('id').split(' ')[1];
                button.addEventListener('click', function() {
                    update(idButton);
                });
            });

            const buttonCreate = document.getElementById('create');
            buttonCreate.addEventListener('click', function() {
                crear();
            });

            const inputImage = document.getElementById("image");

            const previewImage = () => {
                const file = inputImage.files;
                if (file) {
                    const fileReader = new FileReader();
                    fileReader.onload = function (event) {
                        image.src=event.target.result;
                    };
                    fileReader.readAsDataURL(file[0]);
                }
            };


            inputImage.addEventListener('change', previewImage);

        </script>
    @endpush
</x-app-layout>
