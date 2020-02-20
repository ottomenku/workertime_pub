<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daytype extends Model
{
    //use SoftDeletes;
    // protected $dates = ['deleted_at'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daytypes';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ceg_id', 'name', 'szorzo', 'fixplusz', 'color', 'note', 'pub'];

    
    public function getSelectList()
    {
        return $this->all()->pluck('name', 'id');

    }

    public function ceg()
    {
        return $this->belongsTo('App\Ceg'); // assuming user_id and task_id as fk
    }
    public function day()
    {
        return $this->hasMany('App\Day');
    }
}
