<?php

namespace App\Controller;

use App\Entity\Rapport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ExcelController extends AbstractController
{
    #[Route('/excel', name: 'excel')]
    public function index(Request $request): Response
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
        // On crée le nouveau Rapport et on lui ajoute le chemin du fichier
        $Rapport = new Rapport();
        $Rapport->setExcel($filePathName);

        dd($Rapport);
        return $this->render('excel/index.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }
}
