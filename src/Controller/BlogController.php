<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/blog/new", name="blog_create")
     */
    public function create() {
        $article = new Article();

        $form = $this->createFormBuilder($article)
                     ->add('title', null, [
                         'attr' => [
                            'placeholder' => "Titre de l'article"
                         ]
                     ])
                     ->add('content', null, [
                        'attr' => [
                            'placeholder' => "Contenu de l'article"
                            ]
                     ])
                     ->add('image', null, [
                        'attr' => [
                            'placeholder' => "Image de l'article"
                        ]
                     ])
                     ->getForm();

        return $this->render('blog/create.html.twig', [
            'articleForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(ArticleRepository $repo, $id) 
    {
        $article = $repo->find($id);

        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }
}
