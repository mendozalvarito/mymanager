<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CustomerRequest;
use App\Models\Customer;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $customers = Customer::latest()->paginate(10);
        Log::info($customers);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $countries = countries();
        return view('customers.form', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        $person = Person::firstOrCreate([
            'identity_card' => $data['identity_card']
        ]);
        $person->fill($data);
        $person->save();
        $customer = new Customer();
        $customer->fill(['address' => $data['address'], 'mobile' => $data['mobile'], 'email' => $data['email']]);
        $customer->person_id = $person->id;
        $customer->save();
        return redirect(route('customers.index'))->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
