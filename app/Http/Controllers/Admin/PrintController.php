<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rawilk\Printing\Facades\Printing;



class PrintController extends Controller
{
    public function listPrinters(){

        $printers = Printing::printers();

        foreach ($printers as $printer) {
            echo $printer->id();
        }
    }

    public function print(Request $request){

        $print = Printing::newPrintTask()
        ->printer((int) $request[''])
        ->file('/home/raky/Téléchargements/Rapport sur les activités.pdf')
        ->send();

        return $print;
    }
}
