<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use JonnyW\PhantomJs\Client;
use HeadlessChromium\BrowserFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use Codexshaper\WooCommerce\Facades\Order;

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

        $downloadedFilePath = getenv('HOMEDRIVE').getenv('HOMEPATH').'/Téléchargements/doc.pdf';
            
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

                

                /*     // or directly output pdf without saving
                header('Content-Description: File Transfer');
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename=filename.pdf');
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');

                echo base64_decode($pdf->getBase64()); */
                
            } finally {
                // bye
                $browser->close();
            }
    }

    /* function downloadToPDF($width, $height, $view, $downloadedFilePath, $data){
        $pdf = Pdf::setOption(['isRemoteEnabled' => true, 'dpi'=>150])->loadView($view, $data)->setPaper(array(0,0,227.62204724,236.15787402), 'portrait')->save('/home/raky/Documents/Work/JSIT/variantA_bloc1.pdf');
        return $pdf->download();
    } */

    public function downloadVariantA($commande_id){

        //return view('labels.variantA', ['commande'=> $commande]);
        
        $commande = Order::find($commande_id);

        if (($commande['line_items'][0]->meta_data[0]->value[0]->value) == "10 Etiketten mit gleichen Informationen FR") {

            // If he chooses to put the same info on all the 10 labels
            $info1 = $commande['line_items'][0]->meta_data[0]->value[2]->value;
            $info2 = $commande['line_items'][0]->meta_data[0]->value[3]->value;
            $info3 = $commande['line_items'][0]->meta_data[0]->value[4]->value;
            $info4 = $commande['line_items'][0]->meta_data[0]->value[5]->value;

            $info = collect([
                'info1' => $info1, 
                'info2' => $info2, 
                'info3' => $info3, 
                'info4' => $info4]);

            $view = view('labels.variantA', ['info'=> $info])->render();
            header("Content-type: text/html");

            $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[1]->value;

            self::downloadToPDF(3.1496062992, 3.2677165354, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette.'_variantA_bloc1.pdf');
            self::downloadToPDF(3.1496062992, 3.2677165354, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette.'_variantA_bloc2.pdf');

        } elseif (($commande['line_items'][0]->meta_data[0]->value[0]->value) == "10 Etiketten mit NICHT gleichen Informationen FR") {

            // If he chooses to put different info on each of the 10 labels
            $j = 2;
            $data= collect();

            for ($numero_variant=1; $numero_variant <= 2; $numero_variant++) { 
               
                for ($i=1; $i<=5; $i++) { 
                    $k = $j+4;
                    $nb=1;// numero de l'information : de 1 a 4
                    
                    $label_data = collect();

                    while ($j<$k) {
                        $label_data->put("info".$nb,$commande['line_items'][0]->meta_data[0]->value[$j]->value);
                        $j++;
                        $nb++;
                    }

                    $data->put("label".$i."_info", $label_data);

                    $j++;
                }

                $view = view('labels.variantA', ['data'=> $data])->render();
                header("Content-type: text/html");

                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[1]->value;

                self::downloadToPDF(3.1496062992, 3.2677165354, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette.'_variantA_bloc'.$numero_variant.'.pdf');

            }

        }
                
        return redirect('/');

    }

    public function downloadVariantB($commande_id){

        $commande = Order::find($commande_id);

        if (($commande['line_items'][0]->meta_data[0]->value[0]->value) == "10 Etiketten mit gleichen Informationen FR") {
            // If he chooses to put the same info on all the 10 labels
            $info1 = $commande['line_items'][0]->meta_data[0]->value[2]->value;
            $info2 = $commande['line_items'][0]->meta_data[0]->value[3]->value;
            $info3 = $commande['line_items'][0]->meta_data[0]->value[4]->value;
            $info4 = $commande['line_items'][0]->meta_data[0]->value[5]->value;

            $info = collect([
                'info1' => $info1, 
                'info2' => $info2, 
                'info3' => $info3, 
                'info4' => $info4]);

            $view = view('labels.variantB', ['info'=> $info])->render();

            header("Content-type: text/html");
    
            $color_etiquette_1 = $commande['line_items'][0]->meta_data[0]->value[1]->value;
            self::downloadToPDF(3.1496062992, 2.125984252, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette_1.'_variantB_bloc1.pdf');
            $nb_color_array = 5;

            for ($i=2; $i<=10; $i++) { 
                $nb_color_array++;
                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[$nb_color_array]->value;
                self::downloadToPDF(3.1496062992, 2.125984252, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette.'_variantB_bloc'.$i.'.pdf');
            }

        } elseif (($commande['line_items'][0]->meta_data[0]->value[0]->value) == "10 Etiketten mit NICHT gleichen Informationen FR") {
            // If he chooses to put different info on each of the 10 labels
            $j = 2;
            $info = collect();
            $nb_color_array = 1; // place of labels color in array 

            //number of blocs
            for ($i=1; $i<=10; $i++) { 
                //info of labels is in every 4 blocs
                $k = $j+4;
                //information number : 1 to 4
                $nb=1;
                while ($j<$k) {
                    $info->put("info".$nb,$commande['line_items'][0]->meta_data[0]->value[$j]->value);
                    $j++;
                    $nb++;
                }

                $view = view('labels.variantB', ['info'=> $info])->render();
                header("Content-type: text/html");

                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[$nb_color_array]->value;

                self::downloadToPDF(3.1496062992, 2.125984252, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_'.$color_etiquette.'_variantB_bloc'.$i.'.pdf');

                $j++;
                $nb_color_array+=5;
            }

        }

        return redirect('/');
         
    }

    public function downloadEnveloppeDL($commande_id){

        $commande = Order::find($commande_id);

        $view = view('labels.enveloppeDL', ['commande'=> $commande])->render();
        header("Content-type: text/html");

        self::downloadToPDF(8.6614173228, 4.3307086614, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_enveloppeDL.pdf');
        
        return redirect('/');
                
    }

    public function downloadEnveloppeC6($commande_id){

        $commande = Order::find($commande_id);

        $view = view('labels.enveloppeC6', ['commande'=> $commande])->render();
        header("Content-type: text/html");

        self::downloadToPDF(4.7244094488, 3.1496062992, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_enveloppeC6.pdf');
        
        return redirect('/');
                
    }

    public function downloadBonCommande($commande_id){

        $commande = Order::find($commande_id);

        $view = view('labels.bonCommande', ['commande'=> $commande])->render();
        header("Content-type: text/html");

        self::downloadToPDF(7.874015748, 3.937007874, $view, '/home/raky/Documents/Work/JSIT/'.$commande_id.'_bonCommande.pdf');
        
        return redirect('/');
                
    }

    public function downloadAll($commande_id, $variant){

        switch ($variant) {
            case 'A':
                self::downloadVariantA($commande_id);
                self::downloadEnveloppeC6($commande_id);
                self::downloadEnveloppeDL($commande_id);
                self::downloadBonCommande($commande_id);
                break;
            case 'B':
                self::downloadVariantB($commande_id);
                self::downloadEnveloppeC6($commande_id);
                self::downloadEnveloppeDL($commande_id);
                self::downloadBonCommande($commande_id);
                break;
            default:
                break;
        }

        return redirect('/');

    }
}
