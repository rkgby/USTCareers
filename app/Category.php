<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    public $sortable = ['category_name','id'];
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name'
    ];

    public function announcement() {

        return $this->hasMany('App\Announcement');

    }
}
