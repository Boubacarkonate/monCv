<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\Cv1Type;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile/cv')]
class ProfileCVController extends AbstractController
{
    #[Route('/', name: 'app_profile_c_v_index', methods: ['GET'])]
    public function index(Cv $cv): Response
    {
        return $this->render('profile_cv/index.html.twig', [
            'cv' => $cv,
        ]);
    }

    // #[Route('/new', name: 'app_profile_c_v_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, CvRepository $cvRepository): Response
    // {
    //     $cv = new Cv();
    //     $form = $this->createForm(Cv1Type::class, $cv);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $cvRepository->save($cv, true);

    //         return $this->redirectToRoute('app_profile_c_v_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('profile_cv/new.html.twig', [
    //         'cv' => $cv,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_profile_c_v_show', methods: ['GET'])]
    // public function show(Cv $cv): Response
    // {
    //     return $this->render('profile_cv/show.html.twig', [
    //         'cv' => $cv,
    //     ]);
    // }

    #[Route('/{id}/edit', name: 'app_profile_c_v_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv, CvRepository $cvRepository): Response
    {
        $form = $this->createForm(Cv1Type::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cvRepository->save($cv, true);

            return $this->redirectToRoute('app_profile_c_v_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profile_cv/edit.html.twig', [
            'cv' => $cv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_profile_c_v_delete', methods: ['POST'])]
    public function delete(Request $request, Cv $cv, CvRepository $cvRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cv->getId(), $request->request->get('_token'))) {
            $cvRepository->remove($cv, true);
        }

        return $this->redirectToRoute('app_profile_c_v_index', [], Response::HTTP_SEE_OTHER);
    }
}
