<?php

namespace App\Models;

class Notes extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'notes';

    protected $fillable = [
        'related_to',
        'related_id',
        'content',
        'created_by',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'related_to' => 'string',
            'related_id' => 'integer',
            'content' => 'string',
            'created_by' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function related(): MorphTo
    {
        return $this->morphTo('related');
    }
}
