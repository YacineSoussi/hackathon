<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExcelController extends AbstractController
{
    #[Route('/excel', name: 'excel')]
    public function index(Request $request): Response
    {
         $file =  $request->files->get('file');
        dd($file);
        return $this->render('excel/index.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }
}
