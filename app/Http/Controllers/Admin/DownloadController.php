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

    public function enveloppeC6()
    {
        return view('labels.enveloppeC6');
    }

    public function bon()
    {
        return view('labels.bonCommande');
    }

    function downloadToPDF($width, $height, $view, $downloadedFilePath){

        $browserFactory = new BrowserFactory();
        $browser = $browserFactory->createBrowser();
            
            try {
                // creates a new page and navigate to an URL
                $page = $browser->createPage();
                $page->setHtml($view, 300000);

                // screenshot - Say "Cheese"! 😄
               // $page->screenshot()->saveToFile($downloadedFilePath);

                $page->pdf([
                    'preferCSSPageSize'   => true,             // default to false (reads parameters directly from @page)
                    'marginTop'           => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginBottom'        => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginLeft'          => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginRight'         => 0.0,
                    'paperHeight' => $height,
                    'paperWidth' => $width]
                    )->saveToFile($downloadedFilePath);


            } finally {
                // bye
                $browser->close();
            }
    }

    /* function downloadToPDF($width, $height, $view, $downloadedFilePath, $data){
        $pdf = Pdf::setOption(['isRemoteEnabled' => true, 'dpi'=>150])->loadView($view, $data)->setPaper(array(0,0,227.62204724,236.15787402), 'portrait')->save('/home/raky/Documents/Work/JSIT/variantA_bloc1.pdf');
        return $pdf->download();
    } */

    public function downloadVariantA(){

        $view = view('labels.variantA')->render();
        header("Content-type: text/html");

        self::downloadToPDF(3.1496062992, 3.2677165354, $view, '/home/raky/Documents/Work/JSIT/variantA_bloc1.pdf');
        self::downloadToPDF(3.1496062992, 3.2677165354, $view, '/home/raky/Documents/Work/JSIT/variantA_bloc2.pdf');
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
            self::downloadToPDF(3.1496062992, 2.125984252, $view, '/home/raky/Documents/Work/JSIT/variantB_bloc'.$i.'.pdf');
        }
        
        return redirect('/');
                
    }

    public function downloadEnveloppeDL(){

        $view = view('labels.enveloppeDL')->render();
        header("Content-type: text/html");

        self::downloadToPDF(8.6614173228, 4.3307086614, $view, '/home/raky/Documents/Work/JSIT/enveloppeDL.pdf');
        
        return redirect('/');
                
    }

    public function downloadEnveloppeC6(){

        $view = view('labels.enveloppeC6')->render();
        header("Content-type: text/html");

        self::downloadToPDF(4.7244094488, 3.1496062992, $view, '/home/raky/Documents/Work/JSIT/enveloppeC6.pdf');
        
        return redirect('/');
                
    }

    public function downloadBonCommande(){

        $view = view('labels.bonCommande')->render();
        header("Content-type: text/html");

        self::downloadToPDF(8.5, 8.5, $view, '/home/raky/Documents/Work/JSIT/bonCommande.pdf');
        
        return redirect('/');
                
    }

    public function downloadAll(){

        self::downloadVariantA();
        self::downloadVariantB();
        self::downloadEnveloppeC6();
        self::downloadEnveloppeDL();
        self::downloadBonCommande();

        return redirect('/');

    }
}
