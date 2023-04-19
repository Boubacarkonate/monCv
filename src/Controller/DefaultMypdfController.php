<?php

namespace App\Controller;

use App\Entity\Cv;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultMypdfController extends AbstractController
{
    #[Route('/defaultmypdf/{id}', name: 'app_default_mypdf', methods: ['GET'])]
    public function  show(Cv $cv): Response
    {

                             
    $html = $this->renderView('default/mypdf.html.twig', [
            'cv' => $cv,
        ]);

        $options = new Options();                       //instenciation de nouvelles options

        $options->set('defaultFont', 'Arial');        //options souhaitées
        
        $dompdf =new Dompdf($options);                          //instancier une nouvelle class = un nouveau fichier pdf et je lui indique, dans ses parenthèses, la variable contenant mes options
        
        $dompdf->loadHtml($html);      //je veux mettre du html dans pdf
        
        $dompdf->setPaper('A4', 'portrait');                //les différents formats papier que je veux dc en A4... 
        
        $dompdf->render();                              //je veux générer le fichier en  pdf 
        
        $fichier = "monpdf.pdf";       //nom du fichier
        
        $dompdf->stream($fichier);                      //envoies le en tant que fichier à télécharger
        
        return $html= $this->render('default/mypdf.html.twig', [
            'cv' => $cv,
        ]);
    }
}
