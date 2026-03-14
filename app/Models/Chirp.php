<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = ['message',];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
