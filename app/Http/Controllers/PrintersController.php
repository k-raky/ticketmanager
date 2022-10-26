<?php

namespace App\Http\Controllers;
use Rawilk\Printing\Facades\Printing;
use Rawilk\Printing\Contracts\Printer;
use Rawilk\Printing\Contracts\PrinJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Traits\Macroable;
use Rawilk\Printing\Contracts\PrintTask as PrintTaskContract;
use Rawilk\Printing\Exceptions\InvalidSource;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class PrintersController extends Controller
{
   
    public function index()
    {   
        $printers = Printing::printers();
        return view('imprimer',compact('printers'));
    }


    public function printjob()
    { 


    }

}



