<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function questionSets()
    {
        return $this->belongsToMany(QuestionSet::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
