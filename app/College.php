<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Course;

class College extends Model
{
    use Sortable;
    public $sortable = ['college_name','id'];
    protected $fillable = [
        'college_name'
    ];

    public function courses () {

        return $this->hasMany('App\Course','college_id');

    }
}
