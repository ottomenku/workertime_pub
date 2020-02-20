<?php
//figyelem ugyanolyan hulcsnál nem tölti be !!!!!!!!!!!
// a többit igen...
return [
'base'=>[
    'viewpar'=>[ 
        'template'=>'cristal.index',
        'host'=>'http://localhost:8000/',
    'menu' => [
        'admin' => [ //áthelyezve a sidebarba hogy sima kontrollernél is megjelenjen
            1 => ['m/ad.ad.ceg', 'Cégek'],
           2 => ['m/ad.ad.timetypes', ' Időtipusok'],
           3 => ['m/ad.ad.daytypes', ' Natipusok'],
           4 => ['m/ad.ad.basedays', 'Naptár'],
           5 => ['/', ' Home'],
        ],
    
        'superadmin' => [
            1 => ['/admin/pages', ' Pages'],
            2 => ['/admin/generator', ' Generátor'],
        ],
       ] 
    ],
]
];