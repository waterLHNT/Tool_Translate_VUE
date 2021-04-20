<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translations extends Model
{
    use HasFactory;
    protected $table    = 'translations';
    protected $fillable = [
        'id',
        'assignee_id',
        'created_by',
        'updated_by',
        'title',
        'content_default',
        'content_translated',
        'status',
        'type',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

     /**
     * Get the translations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
