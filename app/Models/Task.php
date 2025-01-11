<?php

namespace App\Models;

class Task extends Model
{
    use HasFactory , Notifiable , withData;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status',
        'assigned_to',
        'related_to',
        'related_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
            'due_date' => 'date',
            'status' => 'string',
            'assigned_to' => 'integer',
            'related_to' => 'string',
            'related_id' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
