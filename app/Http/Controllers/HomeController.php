<?php

namespace App\Http\Controllers;

use App\Stored;
use PDF;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function error($error)
    {
        return view('error', $error);
    }
    public function pdf($id)
    {
        $storedob = new Stored();

        $stored = $storedob->find($id)->toarray();
        $data['workerid'] = $stored['worker_id'];
        $data['fulldata'] = json_decode($stored['fulldata'], true);
        $data['solver'] = json_decode($stored['solverdata'], true);

        $html = view('pdfcell', compact('data'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();

    }

}
