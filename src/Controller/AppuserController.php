<?php

namespace App\Controller;

use App\Entity\Appuser;
use App\Form\AppuserType;
use App\Repository\AppuserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/appuser")
 */
class AppuserController extends AbstractController
{
    /**
     * @Route("/", name="appuser_index", methods={"GET"})
     */
    public function index(AppuserRepository $appuserRepository): Response
    {
        return $this->render('appuser/index.html.twig', [
            'appusers' => $appuserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="appuser_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $appuser = new Appuser();
        $form = $this->createForm(AppuserType::class, $appuser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appuser);
            $entityManager->flush();

            return $this->redirectToRoute('appuser_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appuser/new.html.twig', [
            'appuser' => $appuser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="appuser_show", methods={"GET"})
     */
    public function show(Appuser $appuser): Response
    {
        return $this->render('appuser/show.html.twig', [
            'appuser' => $appuser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="appuser_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Appuser $appuser): Response
    {
        $form = $this->createForm(AppuserType::class, $appuser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('appuser_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appuser/edit.html.twig', [
            'appuser' => $appuser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="appuser_delete", methods={"POST"})
     */
    public function delete(Request $request, Appuser $appuser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appuser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($appuser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('appuser_index', [], Response::HTTP_SEE_OTHER);
    }
}
