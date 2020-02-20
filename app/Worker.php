<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use LogsActivity;
    use SoftDeletes;



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *    
     * @var array
     */
    protected $fillable = ['user_id','ceg_id','position','foto', 'fullname', 'workername','cim','tel','birth','ado','tb','start','end','note','pub'];

 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function ceg()
    {
        return $this->belongsTo('App\Ceg');
    }
    public function time()
    {
      return $this->hasMany('App\Time'); 
    }
    public function day()
    {
      return $this->hasMany('App\Day'); // assuming user_id and task_id as fk
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
