<?php

namespace App\Controller;

use App\Entity\Rapport;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExcelController extends AbstractController
{
    #[Route('/excel', name: 'excel')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $file =  $request->files->get('file');

        //  On s'assure que le nom du fichier n'est pas d'espace
        $namefile = $file->getClientOriginalName();
        $searchString = " ";
        $replaceString = "-";

        $namefile = str_replace($searchString, $replaceString, $namefile);

        // On récupère le chemin du stockage des fichiers excel
        $fileFolder = $this->getParameter('excel_directory');

        // On modifie le nom du fichier pour pas qu'il soit en double
        $filePathName = md5(uniqid()) . $namefile;

        // On stock le fichier dans notre serveur
        try {
            $file->move($fileFolder, $filePathName);
        } catch (FileException $e) {
            dd($e);
        }

        // TRAITEMENT DU FICHIER EXCEL
        
        $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file 
        $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line 
        $sheetData = $spreadsheet->getSheet(1)->toArray(null, true, true, true); // here, the read data is turned into an array
     
        
    /******************* On recupère le tableau pour le graph n°1  *****************************/ 

        $tableau1 = [];
        foreach ($sheetData as $key => $Row) { 
            $product_code =  $Row['A'];
            $user_id =  $Row['B'];
            $zone_code =  $Row['C'];
            $score_skinbiosense =  $Row['D'];
            $session_id =  $Row['E'];
            $mesure =  $Row['F'];

            if($score_skinbiosense === 2 && ($session_id === 1 || $session_id === 2) ) {
            array_push($tableau1, [
                        'product_code' => $product_code, 
                        'user_id' => $user_id, 
                        'zone_code' => $zone_code, 
                        'score_skinbiosense' => $score_skinbiosense, 
                        'session_id' => $session_id, 
                        'mesure' => $mesure]);
            }
        }
        // Recupère les tableaux des produits SKC et VITC
       $skc = $this->skc($tableau1);
       $vitc = $this->vitc($tableau1);
        // Recupère la moyenne 
       $moyenne = $this->getMoyenne($tableau1);
    

       return new JsonResponse($tableau1);
        // On crée le nouveau Rapport et on lui ajoute le chemin du fichier
        // $Rapport = new Rapport();
        // $Rapport->setExcel($filePathName);
        // $em->persist($Rapport);
        // $em->flush($Rapport);

      
        return $this->render('excel/index.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }

    /**
     * Permet de recuperer le tableaau de SKC
     *
     * @param [type] $tab
     * @return void
     */
   public function skc($tab) {
    // return $tab;
    $tab1 = [];
    foreach ($tab as $key => $Row) { 
       
        if($Row['product_code'] === 417432) {
            array_push($tab1,[
            'product_code' => $Row['product_code'], 
            'user_id' => $Row['user_id'], 
            'zone_code' => $Row['zone_code'], 
            'score_skinbiosense' => $Row['score_skinbiosense'], 
            'session_id' => $Row['session_id'], 
            'mesure' => $Row['mesure']
        ]);
        }
    }
    return $tab1;
   }

   /**
     * Permet de recuperer le tableaau de SKC
     *
     * @param [type] $tab
     * @return void
     */
    public function vitc($tab) {
        // return $tab;
        $tab1 = [];
        foreach ($tab as $key => $Row) { 
           
            if($Row['product_code'] === 100218) {
                array_push($tab1,[
                'product_code' => $Row['product_code'], 
                'user_id' => $Row['user_id'], 
                'zone_code' => $Row['zone_code'], 
                'score_skinbiosense' => $Row['score_skinbiosense'], 
                'session_id' => $Row['session_id'], 
                'mesure' => $Row['mesure']
            ]);
            }
        }
        return $tab1;
    }

    /**
     * Permet de faire la moyenne des 100 premiers 
     *
     * @param [type] $tab
     * @return void
     */
    public function getMoyenne($tab) {
    $moyenne = [];
        foreach ($tab as $key => $tableau) {
            if($key < 101) {
                array_push($moyenne, $tableau['mesure']);
            }
        }
         return array_sum($moyenne)/count($moyenne);
    }
}
