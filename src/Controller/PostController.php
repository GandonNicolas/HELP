<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
      /**
     * @Route("/post/add", name="post_add")
     */
    public function add(): Response
    {
        return $this->render('post/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
  /**
     * @Route("/post/modify", name="post_modify")
     */

    public function modify(): Response
    {
        return $this->render('post/modify.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
    -----
    
     /**
     * @Route("/add", name="post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $Post = new Post();
        $form = $this->createForm(PostType::class, $Post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Post);
            $entityManager->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('post/add.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/modify", name="post_modify", methods={"GET","POST"})
     */
    public function edit(Request $request, Post $post): Response
    {
        $form = $this->createForm(KeywordType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('keyword_index');
        }

        return $this->render('post/modify.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }
}

