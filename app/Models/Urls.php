<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id', 'title', 'original_url', 'shortener_url'
    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}
