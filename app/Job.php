<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    use Sortable;
    public $sortable = ['id','company', 'job_title', 'job_description',
    'course_id','created_at','updated_at'];
    protected $fillable = [
        'company', 'job_title', 'job_description','photo_id',
        'course_id','job_qualification', 'job_requirement','contact_person','website','is_open','poster'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
     }

     public function course(){
        return $this->belongsTo('App\Course','course_id');
     }
}
