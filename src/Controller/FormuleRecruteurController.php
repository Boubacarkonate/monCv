<?php

namespace App\Controller;

use App\Entity\FormuleRecruteur;
use App\Form\FormuleRecruteurType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\FormuleRecruteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// #[IsGranted("ROLE_USER_RECRUTEUR")   ]
#[Route('/formule_recruteur')]
class FormuleRecruteurController extends AbstractController
{
    #[Route('/', name: 'app_formule_recruteur_index', methods: ['GET'])]
    public function index(FormuleRecruteurRepository $formuleRecruteurRepository): Response
    {
        return $this->render('formule_recruteur/index.html.twig', [
            'formule_recruteurs' => $formuleRecruteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_formule_recruteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FormuleRecruteurRepository $formuleRecruteurRepository): Response
    {
        $formuleRecruteur = new FormuleRecruteur();
        $form = $this->createForm(FormuleRecruteurType::class, $formuleRecruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formuleRecruteurRepository->save($formuleRecruteur, true);

            return $this->redirectToRoute('app_formule_recruteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formule_recruteur/new.html.twig', [
            'formule_recruteur' => $formuleRecruteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formule_recruteur_show', methods: ['GET'])]
    public function show(FormuleRecruteur $formuleRecruteur): Response
    {
        return $this->render('formule_recruteur/show.html.twig', [
            'formule_recruteur' => $formuleRecruteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_formule_recruteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FormuleRecruteur $formuleRecruteur, FormuleRecruteurRepository $formuleRecruteurRepository): Response
    {
        $form = $this->createForm(FormuleRecruteurType::class, $formuleRecruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formuleRecruteurRepository->save($formuleRecruteur, true);

            return $this->redirectToRoute('app_formule_recruteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formule_recruteur/edit.html.twig', [
            'formule_recruteur' => $formuleRecruteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formule_recruteur_delete', methods: ['POST'])]
    public function delete(Request $request, FormuleRecruteur $formuleRecruteur, FormuleRecruteurRepository $formuleRecruteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formuleRecruteur->getId(), $request->request->get('_token'))) {
            $formuleRecruteurRepository->remove($formuleRecruteur, true);
        }

        return $this->redirectToRoute('app_formule_recruteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
