<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ceg extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cegs';

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
    protected $fillable = ['user_id','cegnev','note','pub'];


    public function getUserCeg($user=null)
    {
        if ($user==null) {$user=\Auth::user();}
         if ($user->hasRole('owner')) {// you can pass an id or slug
          $ceg= $this->where('user_id',$user->id)->first(); 
        }
        else
        {
            $worker= Worker::where('user_id',$user->id); 
            $ceg=Ceg::find($worker->ceg_id); 
        }
        
    
        return  $ceg;   
    } 
    /**
     *Listing all corp without base. (for Admin)
     */
    public function getCeg($ACT)
    {
        $ceg= $this->where('id','<>',1);
        $paginate =$ACT['paginate'] ?? 25;
         return  $ceg->latest()->paginate($paginate);   
    } 
    /**
     * make a corp with owner user and és owner roles
     */
    public function makeCeg($data)
    {
     $data['password']=\Hash::make($data['password']);
        $owner=User::create($data);
        $data['user_id']=$owner->id;
        $this->create($data);
     $roles=['owner', 'manager','workadmin']; //,'moderator'
     foreach($roles as $roleStr){
        $role = config('roles.models.role')::where('name', '=', $roleStr)->first(); 
        $owner->attachRole($role);
     }
    }
    /**
     * Chaneg corp and owner data 
     */
    public function updateCeg($id,$data)
    {
        if(isset($data['password']) && !empty($data['password']))
        {$data['password']=\Hash::make($data['password']);}
        else{unset($data['password']);}
        $ceg = Ceg::findOrFail($id);
        $userid=$ceg->user_id;
        $ceg->update($data);
        $user = User::findOrFail($userid);

        $user->update($data);
    }
    public function destroyCeg($id)
    {
        $userid= Ceg::findOrFail($id)->user_id;
        Ceg::destroy($id);
        User::destroy($userid);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function daytype()
    {
        return $this->hasMany('App\Daytype');
    }
    public function timetype()
    {
        return $this->hasMany('App\Timetype');
    }
    public function worker()
    {
        return $this->hasMany('App\Worker');
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
