<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function list( ArticleRepository $articleRepository): Response
    {
        $listArticle = $articleRepository->findAll();
       
        

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'listeArticles' => $listArticle,
        ]);
    }
}
