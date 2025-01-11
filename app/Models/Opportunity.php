<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Opportunity extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'opportunities';

    protected $fillable = [
        'customer_id',
        'lead_id',
        'name',
        'amount',
        'stage',
        'probability',
        'close_date',
        'description',
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
            'lead_id' => 'integer',
            'name' => 'string',
            'amount' => 'float',
            'stage' => 'string',
            'probability' => 'integer',
            'close_date' => 'date',
            'description' => 'string',
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

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Leads::class);
    }
}
