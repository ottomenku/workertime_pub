<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
/**
 * Automatikus Böngésző tesztek  config vezérléssel
 */
class CrudTest extends DuskTestCase
{
    //use \DatabaseMigrations;
    protected $screenshot = true;
    protected $user;
    protected $baseurl = 'http://test.localhost:8000';
    public function setUp(): void//test előtti beállítások

    {
        parent::setUp();
        $this->baseurl = config('motest.dusk.baseurl') ?? $this->baseurl;

    }

    protected function runTstfunc($param, $action, $crudname, $browser)
    {
        if (!is_array($param)) {$param = explode(',', $param);}
        foreach ($param as $par) {
            $par = str_replace("{crudname}", $crudname, $par);
            $pars = explode(':', $par);
            if (isset($pars[1])) {$browser->$action($pars[0], $pars[1]);} else {
                $browser->$action($pars[0]);
            }
        }
        return $browser;
    }

    public function testManagerCrud() //távoli gépen is használható
    {

        $this->browse(function (Browser $browser) {
            $browser->visit($this->baseurl . '/testlogin')
                ->type('email', 'manager@dolgozo.com')
                ->type('password', 'Djjk11j&l')
                ->press('Login')
                ->visit($this->baseurl . '/truncate')
                ->waitFor('@truncated', 10);
            // ->screenshot('testlogin');

            foreach (config('motest.dusk.managercruds') as $crudname => $tasks) {

                foreach ($tasks as $taskname => $actions) {
                    $actions = array_merge(config('motest.dusk.basecruds.' . $taskname), $actions);
                    $off = $actions['off'] ?? false;
                    if (!$off) {
                        //  $tasks = array_merge(config('motest.dusk.managercruds'), $tasks);
                        foreach ($actions as $action => $param) {

                            if ($action == 'visit') {//betöltődik e az adott view
                                $rout = str_replace("{crudname}", $crudname, $param[0]);
                                $browser->visit($this->baseurl . $rout);
                                $browser ->assertPresent($param[1]);
                            } elseif ($action == 'form') {//meg vannak-e az adott mezők
                                foreach ($param[0] as $action1 => $par1) {
                                    $browser = $this->runTstfunc($par1, $action1, $crudname, $browser);
                                }
                            } else {//több paraméter ellenőrzése
                                $browser = $this->runTstfunc($param[0], $action, $crudname, $browser);
                            }
                 
                        }
                        if ($this->screenshot) {$browser->screenshot($crudname . '_' . $taskname);}
                        
                    }

                }

            }
        });
    }

}
