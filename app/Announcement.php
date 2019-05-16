<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{

   use SoftDeletes;
   use Sortable;
   public $sortable = ['id','title', 'user_id','body', 'photo_id','category_id','created_at','updated_at'];
   protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'body', 'photo_id','category_id',
    ];

    protected $dates = ['deleted_at'];

    public function user(){
       return $this->belongsTo('App\User', 'user_id');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
     }

     public function category(){
        return $this->belongsTo('App\Category', 'category_id');
     }
}
