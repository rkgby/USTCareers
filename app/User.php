<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Sortable;
    public $sortable = ['id',
                        'first_name',
                        'last_name',
                        'email',
                        'created_at',
                        'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','role_id','photo_id','is_active',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin(){
        if($this->role->name == 'Admin' && $this->is_active == 1){
            return true;
        }

        return false;
    }
    public function isCounselor(){
        if($this->role->name == 'Counselor' && $this->is_active == 1){
            return true;
        }

        return false;
    }
    public function isStudent(){
        if($this->role->name == 'Student' && $this->is_active == 1){
            return true;
        }

        return false;
    }

    public function announcements(){
        return $this->hasMany('App\Announcement'); 
    }
}