<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
