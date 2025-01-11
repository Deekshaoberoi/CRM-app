<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leads extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'leads';

    protected $fillable = [
        'customer_id',
        'lead_source',
        'status',
        'assigned_to',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'customer_id' => 'integer',
            'lead_source' => 'string',
            'status' => 'string',
            'assigned_to' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
