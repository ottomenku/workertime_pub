<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
    return [
        'base'=>[
            'role'=>['admin'],
            'viewpar' => [
                    'forminclude'=>'baseTaskviews.baseform_include', //alap formgenerátor becsatolása a form.blade-be
                    'menu' => [
                    /*    'admin' => [ // áthelyezve a sidebarba hogy sima kontrolernél is legyen
                            1 => ['m/ad.ad.ceg', 'Cégek'],
                            2 => ['m/ad.ad.timetypes', ' Időtipusok'],
                            3 => ['m/ad.ad.daytypes', ' Natipusok'],
                            4 => ['m/ad.ad.basedays', 'Naptár'],
                            5 => ['/', ' Home'],
                        ],*/
                    ] ]  
    ],
 //base CRUD funkciók. Ha vég  confban nincsnek, vagy üresek, vagy nincsenek engedélyezve, Meghíváskor Nem érvényes task hibát kapunk      
        'index' => [
            'viewpar'=>[ 
                'view'=>'index',
                'table'=>[],
                'table_action'=> ['show'=>true,'edit'=>true,'destroy'=>true  ]
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
             'funcs' => [
                  10=>['validateToDATA',[],'DATA.valid'],
            //      20=>['baseOB::create',['{DATA.valid}']]     
                  ],
              ],
              'show' => [
                'funcs' => [
                // 10=> ['baseOB::findOrFail',['{ACT.id}'],'DATA']     
                  ],
              ],
              'edit' => [
                  'funcs' => [
               //  10=>['baseOB::findOrFail',['{ACT.viewpar.id}'],'DATA']     
                      ],
     
              ],
              'update' => [
                'funcs' => [
                  10=>['validateToDATA',[],'DATA.valid'],   
            //      20=>['baseOB::findOrFail',['{ACT.id}'],'OB.baseOB'],
           //       30=>['baseOB::update',['{DATA.valid}']],   
                  ],
  
              ],
              'destroy' => [
               'funcs' => [
                //  10=>['baseOB::destroy',['{ACT.id}']]    
                  ],

              ],
];
