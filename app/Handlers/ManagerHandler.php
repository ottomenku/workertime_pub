<?php
namespace App\Handlers;
use App\worker;
use App\User;
use App\Ceg; 
class ManagerHandler
{
  
  public function setWorkerAndCegPar($DATA)
  {
    $user=\Auth::user();
    $ceg=$user->getCeg();
    $workers=Worker::where('ceg_id', $ceg->id)->get();
    $DATA['cegid']=$ceg->id;
    $DATA['cegnev']=$ceg->cegnev;
    $DATA['workerids']=$workers->pluck('id')->toarray();  
    $DATA['workerid']=0;
    $DATA['workers']=$workers;
    $DATA['level']=$user->level();
    return $DATA;
  }
}