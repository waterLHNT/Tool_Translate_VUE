<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = [
        'id',
        'user_id',
        'translation_id',
        'content_note',
        'status',
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

    /**
     * Get the translations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function translations()
    {
        return $this->belongsTo(Translations::class);
    }
}
