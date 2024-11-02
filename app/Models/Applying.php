<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applying extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'file',
        'cover_letter',
        'career_id',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
