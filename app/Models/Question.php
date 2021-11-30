<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',  'weightage', 'topic_id',  'difficulty_level', 'user_id'
       ];
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
