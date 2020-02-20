<?php
namespace App\Http\Controllers;
use Ottomenku\MoController\MoController;

class BaseMoController extends MoController
{
    use \Ottomenku\MoController\Trt\Funcrun\FuncrunFull;
    use \Ottomenku\MoController\Trt\Crud\Basecrud;
}
