<x-app-layout>
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center d-flex">
            <h6 class="card-title m-0">{{ __('Products Management') }}</h6>
        </div>
        <div class="card-body">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <!-- User listing Actions-->
            <div class="d-flex justify-content-end align-items-center mb-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                        <i class="ri-add-circle-line align-bottom"></i>
                        {{ __('New Product') }}
                    </button>
                </div>
            </div>
            <!-- /user listing Actions-->
            <!-- User Listing Table-->
            <div class="table-responsive mb-3">
                <table class="table m-0 table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td class="text-muted">{{ $product->description }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                            type="button" id="dropdownOrder-0" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-0">
                                            <li>
                                                <button type="button" onclick="update({{ $product->id }})"
                                                    class="dropdown-item d-flex justify-content-between"
                                                    data-bs-toggle="modal" data-bs-target="#modalForm">
                                                    <span>
                                                        {{ __('Update') }}
                                                    </span>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item d-flex justify-content-between"
                                                        href="#">
                                                        <span>
                                                            {{ __('Delete') }}
                                                        </span>
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /User Listing Table-->
            {!! $products->links() !!}
        </div>
    </div>
    <x-slot name="modal">
        @include('products.modal')
    </x-slot>
    @push('scripts')
        {{-- @vite(['resources/js/handle.js']) --}}
    @endpush
</x-app-layout>
