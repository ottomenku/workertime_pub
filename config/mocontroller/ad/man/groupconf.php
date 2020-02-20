<?php
//figyelem ugyanolyan hulcsnál lefagy!!!!!!!!!!!
//BaseWithRouteController
return ['base' => [
    'role' => ['manager'],
    'viewpar' => [
        'forminclude' => 'baseTaskviews.baseform_include', //alap formgenerátor becsatolása a form.blade-be
        'menu' => [
            'manager' => [
                1 => ['m/ad.man.worker', 'Dolgozók'],
            //    5 => ['ad.man.ceg', 'Cég'],
                10 => ['m/ad.time.manager', 'Munkaidők'],
              //  15 => ['m/ad.man.time.timesimple', 'Munkaidők egyszerűsített'],
              //  20 => ['m/ad.man.messages', 'Üzenetek'],
           //     25 => ['m/ad.man.docs', 'okumentumok'],
           //     30 => ['m/ad.man.time.stored', 'Zárások'],
                35 => ['/', ' Home'],

            ]
       ],
    ],
],
];
