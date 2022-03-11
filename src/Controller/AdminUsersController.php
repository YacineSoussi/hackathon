<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminUsersController extends AbstractController
{
   /**
    * Affiche tous les clients
    *
    * @return Response
    * @Route("/admin/users", name="admin_users")
    */
    public function index(UserRepository $users): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'users' => $users->findAll(),
        ]);
    }
}
