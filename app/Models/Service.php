<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id',
        'name_en',
        'name_kh',
        'detail_en',
        'detail_kh',
        'image',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceDetail(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
