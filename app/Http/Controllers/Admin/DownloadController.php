<?php

namespace App\Http\Controllers\Admin;

use App\Allocation;
use App\Counter;
use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use JonnyW\PhantomJs\Client;
use HeadlessChromium\BrowserFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use Codexshaper\WooCommerce\Facades\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DownloadController extends Controller
{

    public function formatNumber($number){
        if (is_numeric($number)) {
            $formatted_number = substr($number, 0, 3)." ".+substr($number, 3, 3)." ".substr($number, 6, 2)." ".substr($number, 8, 2)." ".substr($number, 10, 2)." ".substr($number, 12, 2);
            return $formatted_number;
        }
        else{
            return $number;
        }
    }

    function createPDF($width, $height, $view, $fileName){

        $browserFactory = new BrowserFactory();
        $browser = $browserFactory->createBrowser();

            try {
                // creates a new page and navigate to an URL
                $page = $browser->createPage();
                $page->setHtml($view, 300000);

                // screenshot - Say "Cheese"! 😄
               // $page->screenshot()->saveToFile($downloadedFilePath);

                $pdf = $page->pdf([
                    'printBackground'     => true,             // default to false
                    'preferCSSPageSize'   => true,             // default to false (reads parameters directly from @page)
                    'marginTop'           => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginBottom'        => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginLeft'          => 0.0,              // defaults to ~0.4 (must be a float, value in inches)
                    'marginRight'         => 0.0,
                    'paperHeight' => $height,
                    'paperWidth' => $width]
                );

                $decoded = base64_decode($pdf->getBase64());
                file_put_contents($fileName, $decoded);

                return $fileName;
                
            } finally {
                // bye
                $browser->close();
            }
    }

    
    function download($file)
    {
        // or directly output pdf without saving
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);

        File::delete($file);
    }

    function downloadZipFileToPDF($files, $zipFileName){

        $zipFile = new ZipArchive;
        $zipFile->open($zipFileName, ZipArchive::CREATE);

        foreach ($files as $file) {
            if (is_array($file)) {
                foreach ($file as $value) {
                    $zipFile->addFile($value, $value);       
                }
            }
            else {
                $zipFile->addFile($file);   
            }
        }

        $zipFile->close(); 

        foreach ($files as $file) {
            if (is_array($file)) {
                foreach ($file as $value) {
                    File::delete($value);
                }
            }
            else {
                File::delete($file);
            }
        }

        self::download($zipFileName);
        
    }


    public function downloadVariantA($commande_id, $all=false){

        $commande = Order::find($commande_id);
        $files_data = array();
        $pdf_files = array();

        if (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit gleichen Informationen")) {
            // If he chooses to put the same info on all the 10 labels
            $info1 = $commande['line_items'][0]->meta_data[0]->value[2]->value;
            $info2 = $commande['line_items'][0]->meta_data[0]->value[3]->value;
            $info3 = $commande['line_items'][0]->meta_data[0]->value[4]->value;
            $info4 = $commande['line_items'][0]->meta_data[0]->value[5]->value;

            $info = collect([
                'info1' => $info1, 
                'info2' => $info2, 
                'info3' => $info3, 
                'info4' => $info4
            ]);

            $view = view('labels.variantA', ['info'=> $info])->render();
            header("Content-type: text/html; charset=utf-8");

            $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[1]->value;

            array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette.'_variantA_bloc1.pdf','view' => $view]);
            array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette.'_variantA_bloc2.pdf','view' => $view]);

        } elseif (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit NICHT gleichen Informationen")) {
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
                header("Content-type: text/html; charset=utf-8");

                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[1]->value;
                array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette.'_variantA_bloc'.$numero_variant.'.pdf','view' => $view]);
            }
                
        }


        foreach ($files_data as $fileName) {
            $file = self::createPDF(3.1496062992, 3.34646, $fileName['view'], $fileName['filename']);
            array_push($pdf_files, $file);
        }

        if ($all) {
            return $pdf_files;
        } else {
            self::downloadZipFileToPDF($pdf_files, $commande_id.'_variantA.zip');
            return redirect('/');
        }

    }

    public function downloadVariantB($commande_id, $all=false){

        $commande = Order::find($commande_id);

        $files_data = array();
        $pdf_files = array();

        if (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit gleichen Informationen")) {
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
            header("Content-type: text/html; charset=utf-8");
    
            $color_etiquette_1 = $commande['line_items'][0]->meta_data[0]->value[1]->value;
            array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette_1.'_variantB_bloc1.pdf', 'view' => $view]);

            $nb_color_array = 5;

            for ($i=2; $i<=10; $i++) { 
                $nb_color_array++;
                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[$nb_color_array]->value;
                array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette.'_variantB_bloc'.$i.'.pdf', 'view' => $view]);
            }

        } elseif (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit NICHT gleichen Informationen")) {
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
                header("Content-type: text/html; charset=utf-8");

                $color_etiquette = $commande['line_items'][0]->meta_data[0]->value[$nb_color_array]->value;
                array_push($files_data, ['filename' => $commande_id.'_'.$color_etiquette.'_variantB_bloc'.$i.'.pdf', 'view' => $view]);

                $j++;
                $nb_color_array+=5;
            }
        }

        foreach ($files_data as $fileName) {
            $file = self::createPDF(3.14961, 2.12598, $fileName['view'], $fileName['filename']);
            array_push($pdf_files, $file);
        }

        
        if ($all) {
            return $pdf_files;
        } else {
            self::downloadZipFileToPDF($pdf_files, $commande_id.'_VariantB.zip');
            return redirect('/');
        }
         
    }

    public function downloadBonCommande($commande_id, $all=false){

        $commande = Order::find($commande_id);
        $file = null;
        
        if (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit gleichen Informationen")) {
            // If he chooses to put the same info on all the 10 labels
            $info1 = $commande['line_items'][0]->meta_data[0]->value[2]->value;
            $info2 = $commande['line_items'][0]->meta_data[0]->value[3]->value;
            $info3 = $commande['line_items'][0]->meta_data[0]->value[4]->value;
            $info4 = $commande['line_items'][0]->meta_data[0]->value[5]->value;

            $info = collect([
                'info1' => $info1, 
                'info2' => $info2, 
                'info3' => $info3, 
                'info4' => $info4
            ]);

            $file = self::downloadLabel($commande_id, $all,'bonCommande', 7.87402, 3.93701, $info);          

        } elseif (str_contains(($commande['line_items'][0]->meta_data[0]->value[0]->value),"10 Etiketten mit NICHT gleichen Informationen")) {
            // If he chooses to put different info on each of the 10 labels

            $j = 2;
            $info = collect();

            for ($i=1; $i<=10; $i++) { 
                $k = $j+4;
                $nb=1;// numero de l'information : de 1 a 4
                
                $label_data = collect();

                while ($j<$k) {
                    $label_data->put("info".$nb,$commande['line_items'][0]->meta_data[0]->value[$j]->value);
                    $j++;
                    $nb++;
                }

                $info->put("label".$i."_info", $label_data);
                $j++;
            }
            
            $file = self::downloadLabel($commande_id, $all,'bonCommande', 7.87402, 3.93701, $info );          
                
        }

        if ($file){
            return $file;
        }
    }


    public function downloadLabel($commande_id, $all, $name, $width, $height,$info=null){

        $commande = Order::find($commande_id);
        
        $allocated = Allocation::where('commande_id', $commande_id)->get();
        $counter = Counter::find(1);

        $counterValue = $counter['value']+1;

        $view = view('labels.'.$name, ['commande'=> $commande,'info' => $info, 'allocation' => $allocated, 'counter' => $counterValue])->render();
        header("Content-Type: text/html; charset=utf-8");

        $file = self::createPDF($width, $height, $view, $commande_id.'_'.$name.'.pdf');
    
        if ($name == "enveloppeC7" || $name == "bonCommande") {
            $counter->value = $counterValue;
            $counter->save();
        }
        
        if ($all) {
            return $file;
        } else {
            self::download($file, $file);
            return redirect('/');
        }
                
    }

    public function downloadEnveloppeDL($commande_id){
        self::downloadLabel($commande_id, false,'enveloppeDL', 8.6614173228, 4.3307086614);    
    }

    // client asked to remove C7
    public function downloadEnveloppeC7($commande_id){
        self::downloadLabel($commande_id, false,'enveloppeC7', 4.7244094488, 3.1496062992);      
    }

    /* public function downloadBonCommande($commande_id){
        self::downloadLabel($commande_id, false,'bonCommande', 8.6614173228, 4.3307086614);          
    } */

    public function downloadAll($commande_id, $variant){

        //$enveloppeC7_file = self::downloadLabel($commande_id, true,'enveloppeC7', 4.7244094488, 3.1496062992);
        $enveloppeDL_file = self::downloadLabel($commande_id, true,'enveloppeDL', 8.6614173228, 4.3307086614);
        $bon_file = self::downloadBonCommande($commande_id, true);

        switch ($variant) {
            case 'A':
                $variant_files = self::downloadVariantA($commande_id, true);   
                break;
            case 'B':
                $variant_files = self::downloadVariantB($commande_id, true);
                break;
            default:
                break;
        }

        $pdf_files = array($variant_files, $enveloppeDL_file, $bon_file);
        
        self::downloadZipFileToPDF($pdf_files, $commande_id.'_All.zip');

        return redirect('/');

    }
}
