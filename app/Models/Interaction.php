<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Interaction extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'interactions';

    protected $fillable = [
        'customer_id',
        'opportunity_id',
        'lead_id',
        'type',
        'subject',
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
            'opportunity_id' => 'integer',
            'lead_id' => 'integer',
            'type' => 'string',
            'subject' => 'string',
            'description' => 'string',
            'assigned_to' => 'integer',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }
}
