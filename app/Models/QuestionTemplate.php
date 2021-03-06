<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static withCount(string $string)
 */
class QuestionTemplate extends Model
{
    protected $fillable = ['name', 'department_id', 'subject_id', 'is_active', 'is_deleted', 'total_questions', 'total_marks', 'negative_marks'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
