<?php

namespace App\Http\Requests\Common;

use App\Enums\Gender;
use Illuminate\Validation\Rule;

trait PersonRequest
{
    protected function rulesPerson(): array
    {
        return [
            'identity_card' => 'required|max:50|string',
            'first_name' => 'string|max:50|nullable',
            'last_name' => 'string|max:50|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'gender' => ['string', 'nullable', Rule::in(array_column(Gender::cases(), 'value'))],
            'birthdate' => 'date|nullable',
            'nationality' => 'string|max:50|nullable',
        ];
    }
}
