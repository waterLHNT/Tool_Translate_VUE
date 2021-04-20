<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'id',
        'user_id',
        'translation_id',
        'content',
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
