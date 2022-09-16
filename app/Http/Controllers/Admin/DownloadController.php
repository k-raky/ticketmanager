<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use JonnyW\PhantomJs\Client;
use HeadlessChromium\BrowserFactory;
use Barryvdh\DomPDF\Facade\Pdf;


class DownloadController extends Controller
{

    public function variantA()
    {
        return view('labels.variantA');
    }

    public function variantB()
    {
        return view('labels.variantB');
    }

    public function enveloppeDL()
    {
        return view('labels.enveloppeDL');
    }

    function printPage($width, $height, $view, $downloadedFilePath){

        $browserFactory = new BrowserFactory();

        $browser = $browserFactory->createBrowser();
            
            try {
                // creates a new page and navigate to an URL
                $page = $browser->createPage();
                $page->setHtml($view, 30000);

                // screenshot - Say "Cheese"! 😄
               // $page->screenshot()->saveToFile($downloadedFilePath);

                $page->pdf([
                    'preferCSSPageSize'   => true,             // default to false (reads parameters directly from @page)
                    'marginTop'           => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginBottom'        => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginLeft'          => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginRight'         => 0.0,
                    'paperHeight' => 3.2677165354,
                    'paperWidth' => 3.1496062992]
                    )->saveToFile('/home/raky/Documents/Work/JSIT/variantA_bloc1.pdf');


            } finally {
                // bye
                $browser->close();
            }
    }

    function downloadToPDF($width, $height, $view, $downloadedFilePath, $data){
        $pdf = Pdf::setOption(['isRemoteEnabled' => true, 'dpi'=>150])->loadView($view, $data)->setPaper(array(0,0,227.62204724,236.15787402), 'portrait')->save('/home/raky/Documents/Work/JSIT/variantA_bloc1.pdf');
        return $pdf->download();
    }

    public function downloadVariantA(){

        $view = view('labels.variantA')->render();
        header("Content-type: text/html");

        self::printPage(302.36220472, 313.7007874, $view, '/home/raky/Documents/Work/JSIT/code/storage/app/public/img/variantA_bloc1.png');
        self::printPage(302.36220472, 313.7007874, $view, '/home/raky/Documents/Work/JSIT/code/storage/app/public/img/variantA_bloc2.png');
        //self::printPage(302.36220472, 313.7007874, $view, '/home/raky/Documents/Work/JSIT/variantA_bloc2.png');

        /* $data = [
            'imagePath' => public_path('storage/img/variantA_bloc1.png'),
        ];
        self::downloadToPDF('','','labels.image','', $data); */
                
        return redirect('/');

    }

    public function downloadVariantB(){

        $view = view('labels.variantB')->render();
        header("Content-type: text/html");

        for ($i=1; $i<=10; $i++) { 
            self::printPage(302.36220472, 204.09448819, $view, '/home/raky/Documents/Work/JSIT/variantB_bloc'.$i.'.png');
        }
        
        return redirect('/');
                
    }
}
