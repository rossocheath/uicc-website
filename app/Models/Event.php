<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, softDeletes,Notifiable;

    protected $fillable = [
        'user_id',
        'title_en',
        'title_kh',
        'detail_en',
        'detail_kh',
        'event_date',
        'image',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
