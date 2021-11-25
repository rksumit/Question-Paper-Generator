<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function questionSets()
    {
        return $this->hasMany(QuestionSet::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
