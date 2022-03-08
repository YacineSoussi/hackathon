<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
   
    /*************************PUBLIC*************************/
    #[Route('/', name: 'home')]
    public function index(): Response
    {   
        return $this->render('public/home/index.html.twig', [
            'controller_name' => 'HomeController',
           
        ]);
    }

    /********************COMPTE****************************/

    #[Route('/compte/home', name: 'compte_home')]
    public function index_compte(): Response
    {  
        return $this->render('compte/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /************************ADMIN************************/

    #[Route('/admin/home', name: 'admin_home')]
    public function index_admin(): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
