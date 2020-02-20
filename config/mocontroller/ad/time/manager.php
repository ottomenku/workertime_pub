<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
//BaseWithRouteController
return [
    'base' => [
        'role' => ['manager'],
        'obClass' => ['baseOB' => 'App\Handlers\ManagerHandler'],
        'viewpar' => [
            'baseroute' => 'm/ad.time.manager/', //ez alapján múködnek a gombok
            'route' => 'm/ad.time.manager/',]
    ],
    'index' => [
      
        // 'delFromParrent' => ['obClass', 'funcs'],
        //'return' => ['viewFull', 'MOcalendarVue.calendarManager'],
        'return' => ['viewFull', 'MOcalendarVue.calendarManager'],
            //  'return'=>['dump']
    ],

    'getbasedata' => [
        'allowed'=>true,
        //'return'=>['dump']
    ],
    'freshdata' => [
        'allowed'=>true,
    ],

//stored---------------------------
'delstored' => [
  'funcs' => [
      20 => ['stored::delStored', ['{DATA.valid}']],
      90 => ['stored::getStoreds', ['{DATA.valid}'], 'DATA.storeds'],
  ],
  'return' => ['json'],
],
'storestored' => [
  'funcs' => [
      20 => ['stored::storeStored', ['{DATA.valid}']],
      90 => ['stored::getStoreds', ['{DATA.valid}'], 'DATA.storeds'],
  ],
  'return' => ['json'],
],

//day functions-------------------------------------
    'resetdays' => [
        'allowed'=>true,
    ],
    'delday' => [
        'allowed'=>true,
    ],
    'storedays' => [
        'allowed'=>true,
    ],
// time functioms---------------------------------------
    'resettimes' => [
        'allowed'=>true,
    ],
    'deltime' => [
        'allowed'=>true,
    ],
    'storetimes' => [
        'allowed'=>true,
    ],

];