<?php

return [
  // itt lehet definiálni hogy az admin controller milyen szintű felhasználónak milyen routot hívjon meg belépés után  
    'routeForRole' => [
        'superadmin' => ['m/ad.man.user'],
        'admin' => ['m/ad.ad.ceg'],
        'owner' => ['m/ad.man.worker'],
        'manager' => ['m/ad.time.manager'],
        'workadmin' => ['m/ad.wad.worker'],
        'worker' => ['m/ad.time.worker'],   
    ],

];