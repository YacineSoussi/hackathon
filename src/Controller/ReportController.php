<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     *   show all reports
     *
     * @return Response
     * @Route("/admin/reports", name="admin_reports")
     */
    public function index(): Response
    {
        return $this->render('admin/report/index.html.twig', []);
    }
}
