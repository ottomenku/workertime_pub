<?php
namespace App\Handlers;
use App\worker;
use App\User;
use App\Ceg; 
class ModelHandler
{
    public function loginUser($userid) //12 owner1, 20 worker1, 23 worker2 (mind a cég1-ben cegid 4 )
    {  
        \Auth::logout();
        $user = User::findOrFail($userid);
        \Auth::login($user);
    }
}