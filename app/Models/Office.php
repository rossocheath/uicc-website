<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'user_id',
        'name_en',
        'name_kh',
        'description_en',
        'description_kh',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
