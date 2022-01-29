<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'teacher_id'
    ];

    public function questionSets()
    {
        return $this->hasMany(QuestionSet::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
