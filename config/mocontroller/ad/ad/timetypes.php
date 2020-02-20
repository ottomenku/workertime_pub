<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
    return [
        'base'=>[
            'role'=>['admin'],
            'funcs' => [ 
              3=>['replaceACT',[]] 
            ],
            'obClass'=>['baseOB'=>'App\Timetype'],
            'viewpar'=>[
                'route'=>'m/ad.ad.timetypes', //ez alapján múködnek a gombok
                    'form'=>[          
                        'name'=>['text','Név',[]],
                        'note'=>['text','Megjegyzés',[]],
                       // 'workday'=>['radiolist','',[['1','Munkanap' ],['0','Pihenőnap',true ]]] ,
                        'szorzo'=>['number','Szorzó',[ 'step' => '0.01']],
                      //  'fixplusz'=>['number','Fixplusz',[]],  
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
                    'name'=>['Név'],
                    'szorzo'=>['Szorzó',],
                    'fixplusz'=>['fixplusz'],
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
                  20=>['baseOB::moCreate',['{DATA.valid}']]     
                  ],
              ],
              'show' => [
                'funcs' => [
                 10=> ['baseOB::findOrFail',['{ACT.id}'],'DATA']     
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
                  10=>['baseOB::destroy',['{ACT.id}']]    
                  ],

              ],
];