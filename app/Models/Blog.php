<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'user_id',
        'title_en',
        'title_kh',
        'description_en',
        'description_kh',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
