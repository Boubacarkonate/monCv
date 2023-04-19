<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LesannoncesController extends AbstractController
{
    #[Route('/lesannonces', name: 'app_lesannonces')]
    public function index(): Response
    {
        return $this->render('lesannonces/index.html.twig', [
            'controller_name' => 'LesannoncesController',
        ]);
    }
}
