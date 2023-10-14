<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class computer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'cpu', 'gpu', 'is_online'];

    protected $casts = ['is_online' => 'boolean'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
