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
        
        $printerId = $request->printerId;
        Printing::newPrintTask()
        ->printer(715948417159484271594843715948447159484571594846)
        ->file('/home/raky/Téléchargements/2665_variantB_bloc1.pdf')
        ->send();
    }
}
