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
                <p class="text-primary m-0 fw-bold">{{ trans('Manage :name', ['name' => __('Customers')]) }}</p>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ trans('Create :name', ['name' => __('Customer')]) }}
                        </a>
                    </div>
                </div>
                @if (isset($customers))
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table table-hover my-0 align-middle" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-bg-primary">{{ __('Customer') }}</th>
                                    <th class="text-bg-primary">{{ __('Personal information') }}</th>
                                    <th class="text-bg-primary">{{ __('Contact information') }}</th>
                                    <th class="text-bg-primary text-center">{{ __('Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($customers->isEmpty())
                                    <tr>
                                        <td colspan="3">
                                            <p class="text-center">{{ __('No records found') }}</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>
                                                <p>{{ $customer->person->first_name . ' ' . $customer->person->last_name }}
                                                </p>
                                                <p>RUN: {{ $customer->person->identity_card }}</p>
                                            </td>
                                            <td>
                                                <p>{{__('Gender')}} {{ $customer->person->gender }}</p>
                                                <p>{{ $customer->person->birthdate }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $customer->email }}</p>
                                                <p>{{ $customer->mobile }}</p>
                                            </td>
                                            <td>
                                                <div class="m-2 d-flex justify-content-evenly">
                                                    <form action="{{ route('customers.edit', $customer->id) }}">
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-title="{{ __('Update') }}"><i
                                                                class="fas fa-edit"></i> </button>
                                                    </form>
                                                    <form action="{{ route('customers.destroy', $customer->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-title="{{ __('Delete') }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        {!! $customers->links() !!}
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ __('Server Error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
