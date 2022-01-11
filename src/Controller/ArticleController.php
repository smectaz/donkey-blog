<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function list( ArticleRepository $articleRepository, Request $request, PaginatorInterface $paginatorInterface): Response
    {
        //$listArticle = $articleRepository->findAll();
        $datas = $articleRepository->findBy([], ['id' => 'asc']);
        $articles = $paginatorInterface->paginate(
        $datas,
        $request->query->getInt('page',1),
        6
        );
        

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'pagination' => $articles,
        ]);
    }
}
