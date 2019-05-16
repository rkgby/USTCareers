<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id','course', 'student_number',
    ];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
