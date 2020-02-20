<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
return [
'base' => [
     'funcs' => [
      1 => ['replaceACT', []],
      100 => ['replaceACT', []],
            // 3=> ['setUserPar',[]]
          ],
    'viewpar' => [
        'template' => 'admin_crudgenerator',
         'frame' => 'backend',
         'Taskviews' => 'baseTaskviews'  ,
    ],
],
'index' => [
    'viewpar'=>[ 
     //   'view'=>'index',
      //  'table'=>[],
      //  'table_action'=> ['show'=>true,'edit'=>true,'destroy'=>true  ]
        ] ,     
  
    'return'=>['view'] 
],
'create' => [
    'viewpar'=>[
        'taskhead'=>'Új rekord',
        'view'=>'form',
       // 'form'=>['formStart'=>['formstartCreate',[],false]], //nem zárja le a formot
        'form'=>['formStart'=>['formstartCreate']],//lezárja a formot
        ],
  'return'=>['view']   
    ],
    
'store' => [
  /*  'funcs' => [
    10=>['validateToDATA',[],'DATA.valid'],
    20=>['baseOB::create',['{DATA.valid}']]     
    ],*/
    'return'=>['redirect','{ACT.viewpar.route}','Adatok mentve'] 
],
'show' => [
  /*  'funcs' => [
   10=> ['baseOB::findOrFail',['{ACT.id}'],'DATA']     
    ],*/
    'return'=>['view','{ACT.viewpar.route}.show'] 
],
'edit' => [
   /* 'funcs' => [
   //    10=>['baseOB::findOrFail',['{ACT.viewpar.id}'],'DATA']     
        ],*/
    'viewpar'=>[ 
        'taskhead'=>'Új rekord',
        'view'=>'form',
        'form'=>['formStart'=>['formstartEdit']],
    ],
    'return'=>['view'] 
],
'update' => [
    'succes_message'=>'Adatok frissítése sikeres!',
  /*  'funcs' => [
    10=>['validateToDATA',[],'DATA.valid'],   
    20=>['baseOB::findOrFail',['{ACT.id}'],'OB.baseOB'],
    30=>['baseOB::update',['{DATA.valid}']],   
    ],*/
    'return'=>['redirect','{ACT.viewpar.route}'] 
],
'destroy' => [
  /*  'funcs' => [
    10=>['baseOB::destroy',['{ACT.id}']]    
    ],*/
    'return'=>['redirect','{ACT.viewpar.route}','{ACT.succes_message}'] 
],
];
