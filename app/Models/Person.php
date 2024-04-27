<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_card',
        'first_name',
        'last_name',
        'image',
        'gender',
        'birthdate',
        'nationality',
    ];

    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
        ];
    }

    public function customer():HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
