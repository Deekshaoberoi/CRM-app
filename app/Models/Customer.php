<?php

namespace App\Models;

class Customer extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'company' => 'string',
            'address' => 'string',
            'city' => 'string',
            'state' => 'string',
            'country' => 'string',
            'postal_code' => 'string',
        ];
    }
}
