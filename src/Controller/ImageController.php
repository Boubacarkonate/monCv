<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Repository\AnnonceRepository;
use App\Repository\CvRepository;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ImageController extends AbstractController
{
    #[Route('/image', name: 'app_image')]
    public function index(FileUploader $fileUploader, Request $request, CvRepository $cvRepository): Response
    {   
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
 

            // on recupere l'image issue du formulaire
            // "image" est le nom de notre image dans le form
            $imagecv = $form->get('firstName')->getData();
            // dd($imageproduit);
            
            // le cas ou l'image a été posté
            if ($imagecv) {
                // on utilise le service fileUploader
                // pour envoyé l'image dans le public/img
                $imagecv_nom = $fileUploader->upload($imagecv);
                
                // envoyé dans l'entité le nom de l'image
                $cv->setFirstName($imagecv_nom);
            }

            $cvRepository->save($cv, true);


        return $this->render('image/index.html.twig', [], Response::HTTP_SEE_OTHER);
    }

        return $this->renderForm('admin_produit/new.html.twig', [
            'produit' => $cv,
            'form' => $form,
        ]);
}  

}
        
