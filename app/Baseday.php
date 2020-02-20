<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Baseday extends Model
{
    use LogsActivity;
    use SoftDeletes; 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'basedays';

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
    protected $fillable = ['daytype_id','ceg_id', 'datum', 'note', 'pub'];

    public function moIndex()
    {
   return  $ceg= $this->where('ceg_id',1)->get();

      }
    public function moCreate()
    { 
        $data['daytype_id_list']=Daytype::all()->pluck('name', 'id');
        return $data;  
    }
//worker---------------
/*
public function getBaseDays($month=0,$year=0,$justceg=false)
{
    if($justceg){ $cegid=Worker::where('user_id', \Auth::user()->id)->first()->ceg_id;}
    else{$cegid=1;}
    return $this->getBDays($month,$year,$cegid);
}
*/
public function getBaseDays($year=0,$month=0,$cegid=1)
{
    $res=[];
    if(empty($year)){$year= Carbon::now()->year;}
    if(empty($month)) {$month= Carbon::now()->month;}
    if(strlen($month)<2){$month='0'.$month;}

    $days= $this->with('daytype')->where([
        ['ceg_id', '=', $cegid],
        ['datum', 'like', $year.'-'.$month.'%']
    ])->get();
    foreach($days as $day){
        $res[$day->datum]=$day->toarray();
    }
return $res;  
}
/*
public function getBaseDays($month=0,$year=0,$cegid) //tulajdonos
{
    if($justceg){   
        $user=\Auth::user();
        $cegid= Ceg::where('user_id',$user->id)->first()->id; }
    else{$cegid=1;}
    return $this->getBDays($month,$year,$cegid);
}
//admin-------------------

public function getBaseDaysToMan($month=0,$year=0,$justceg=false) //tulajdonos
{
    if($justceg){   
        $user=\Auth::user();
        $cegid= Ceg::where('user_id',$user->id)->first()->id; }
    else{$cegid=1;}
    return $this->getBDays($month,$year,$cegid);
}


*/

    public function moStore($data)
    {
        $data['ceg_id']=1;
      return $this->create($data);  
    }


 public function moEdit($id)
    {
        $data=$this->findOrFail($id); 
        $data['daytype_id_list']=Daytype::all()->pluck('name', 'id');
      return $data;  
    }
 public function moUpdate($id,$data)
    {
      $data['ceg_id']=1;
      $daytype= $this->findOrFail($id);  
      $daytype->update($data);

    }
    public function moDestroy($id)
    {
        $this->destroy($id);
    }
    public function moPub($id,$level)
    {
        $Day = $this->findOrFail($id);

        if($level>20 && $level<= abs($Day->pub))
        {
            $data['pub']=$level;
            $Day->update($data);
        }
    }
    public function moUnpub($id,$level)
    {
        $Day = $this->findOrFail($id);
        if($level>20 && $level<= abs($Day->pub))
        {
            $data['pub']=-$level;
            $Day->update($data);
        }
    }



    public function daytype()
	{
		return $this->belongsTo('App\Daytype');
	}
    public function worker()
    {
        return $this->belongsTo('App\Worker');
    } 
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
