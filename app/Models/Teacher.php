<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;

    protected $fillable = [
        'address',
        'qualification',
        'experience',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subjects()
    {
        return $this->hasMany(subject::class);
    }
}
