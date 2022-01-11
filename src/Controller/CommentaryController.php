<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaryController extends AbstractController
{
    #[Route('/commentary', name: 'commentary')]
    public function index(): Response
    {
        return $this->render('commentary/commentary.html.twig', [
            'controller_name' => 'CommentaryController',
        ]);
    }
}
