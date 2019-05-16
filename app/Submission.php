<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Submission extends Model
{
    use Sortable;
    use SoftDeletes;
    public $sortable = ['studnum',
                        'fname',
                        'course',
                        'email',
                        'created_at',];
    protected $fillable = [
        'summary_id'
    ];

    protected $table = 'submissions';

    protected $dates = ['deleted_at'];
    
    public $primaryKey = 'id';

    public $timestamps = true;

    public function summary() {
        return $this->belongsTo('App\Summary', 'summary_id');
    }
}
