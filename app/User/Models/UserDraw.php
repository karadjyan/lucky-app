<?php

namespace App\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDraw extends Model
{
    protected $fillable = [
        'user_id',
        'number',
        'is_win',
        'win_amount'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts()
    {
        return [
            'is_win' => 'boolean',
        ];
    }
}
