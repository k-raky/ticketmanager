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
        ->printer((int) $request->printerId)
        ->file('/home/raky/Téléchargements/2665_variantB_bloc1.pdf')
        ->send();

        return $print;
    }
}
