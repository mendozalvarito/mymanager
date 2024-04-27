<?php

namespace App\Http\Requests\Customers;

use App\Http\Requests\Common\PersonRequest;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

    use PersonRequest;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge($this->rulesPerson(),[
            'address' => 'required|string|max:150',
            'mobile' => 'nullable|string|max:50',
            'email' => 'nullable|email|string|max:50',
        ]);
    }
}
