<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\College;

class Course extends Model
{
    use Sortable;
    public $sortable = ['course_name', 'college_id','id'];
    protected $fillable = [
        'course_name', 'college_id',
    ];

    public function college () {

        return $this->belongsTo('App\College', 'college_id');

    }
}
