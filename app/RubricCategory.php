<?php
use App\RubricTitle;
use App\Rating;
namespace App;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Model;
    
class RubricCategory extends Model
{
    use Sortable;
    public $sortable = ['name','title_id', 'rating_id','id'];
    protected $fillable = [
        'name','title_id', 'rating_id',
    ];
    public function rating() {
        return $this->belongsTo('App\Rating');
    }
    public function title() {
        return $this->belongsTo('App\RubricTitle');
    }
}
