<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
    return [
        'base'=>[
            'role'=>['admin'],
            'funcs' => [ 
              3=>['replaceACT',[]] 
            ],
            'obClass'=>['baseOB'=>'App\Baseday'],
            'viewpar'=>[
                'route'=>'m/ad.ad.basedays', //ez alapján múködnek a gombok
                    'form'=>[          
                        'daytype_id'=>['select','Naptípus',[]],
                        'note'=>['text','Megjegyzés',[]],
                       // 'workday'=>['radiolist','',[['1','Munkanap' ],['0','Pihenőnap',true ]]] ,
                        'datum'=> ['date','',[]],
                        'pub'=>['radiolist','',[['1','Tiltva' ],['0','Engedélyezve',true ]]] ,
                         'submit'=>['submit','Cég mentése'], //,'submit'=>['submit','Ment','class'=>'btn btn-danger'] 
                        'formend'=>['formend']
                ] ] 
        ],
        'index' => [
            'viewpar'=>[ 
                'view'=>'index',
                'table'=>[
                    'id'=>[],
                    'daytype_id'=>['Naptípus','$item->daytype->name'],
                    'datum'=>['Dátum',],
                    'note'=>['megjegyzés'],
                   // 'workday'=>['Munkanap'],
                ],
                'table_action'=> ['show'=>true,'edit'=>true,'destroy'=>true  ]
                ] ,     
                'funcs' => [ 
                     10=>['baseOB::moindex',[],'DATA.tabledata'] 
                   ],
            'return'=>['view'] 
           // 'return'=>['dump'] 
        ],
        'create' => [
            'funcs' => [ 10=>['baseOB::moCreate',[],'DATA'] ],
            'viewpar'=>[
                'taskhead'=>'Új rekord',
                'view'=>'form',
               // 'form'=>['formStart'=>['formstartCreate',[],false]], //nem zárja le a formot
                'form'=>['formStart'=>['formstartCreate']],//lezárja a formot
                ],
          'return'=>['view']   
            ],
            
            'store' => [
             'funcs' => [
                  10=>['validateToDATA',[],'DATA.valid'],
                  20=>['baseOB::moStore',['{DATA.valid}']]     
                  ],
              ],
              'show' => [
                'funcs' => [
                 10=> ['baseOB::moShow',['{ACT.id}'],'DATA']     
                  ],
              ],
              'edit' => [
                  'funcs' => [
                 10=>['baseOB::moEdit',['{ACT.viewpar.id}'],'DATA']     
                      ],
     
              ],
              'update' => [
                'funcs' => [
                  10=>['validateToDATA',[],'DATA.valid'],   
                  20=>['baseOB::moUpdate',['{ACT.viewpar.id}','{DATA.valid}']],   
                  ],
  
              ],
              'destroy' => [
               'funcs' => [
                  10=>['baseOB::moDestroy',['{ACT.id}']]    
                  ],

              ],
];