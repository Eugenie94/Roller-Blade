<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
   /**
     * @Route ("/", name="default_index", methods={"GET"})
     * Page d'Accueil
     * http://localhost:8000/
     */
    public function index()
    {
        # On retourne au client une réponse HTTP.
        # return new Response("<h1>Page Accueil</h1>");
        return $this->render('default/index.html.twig');
    }
}
