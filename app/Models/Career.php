<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'user_id',
        'title_en',
        'title_kh',
        'business_unit_en',
        'business_unit_kh',
        'location_en',
        'location_kh',
        'description_en',
        'description_kh',
        'logo',
        'job_nature',
        'date_start',
        'date_end',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

