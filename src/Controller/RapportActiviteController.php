<?php

namespace App\Controller;

use App\Entity\RapportActivite;
use App\Form\RapportActiviteType;
use App\Repository\RapportActiviteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/rapport')]
class RapportActiviteController extends AbstractController
{
    #[Route('/index', name: 'rapport', methods: ['GET'])]
    public function index(RapportActiviteRepository $rapportActiviteRepository): JsonResponse
    {
        return $this->render('rapport_activite/index.html.twig', [
            'rapport_activites' => $rapportActiviteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'rapport_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        $rapportActivite = new RapportActivite();
        $form = $this->createForm(RapportActiviteType::class, $rapportActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportActiviteRepository->save($rapportActivite, true);

            return $this->redirectToRoute('rapport', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_activite/new.html.twig', [
            'rapport_activite' => $rapportActivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rapport_show', methods: ['GET'])]
    public function show(RapportActivite $rapportActivite): Response
    {
        return $this->render('rapport_activite/show.html.twig', [
            'rapport_activite' => $rapportActivite,
        ]);
    }

    #[Route('/{id}/edit', name: 'rapport_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RapportActivite $rapportActivite, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        $form = $this->createForm(RapportActiviteType::class, $rapportActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportActiviteRepository->save($rapportActivite, true);

            return $this->redirectToRoute('rapport', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_activite/edit.html.twig', [
            'rapport_activite' => $rapportActivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rapport_delete', methods: ['POST'])]
    public function delete(Request $request, RapportActivite $rapportActivite, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportActivite->getId(), $request->request->get('_token'))) {
            $rapportActiviteRepository->remove($rapportActivite, true);
        }

        return $this->redirectToRoute('rapport', [], Response::HTTP_SEE_OTHER);
    }
}
