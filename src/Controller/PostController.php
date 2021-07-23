<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

}