<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Produit controller.
 *
 * @Route("/Identification")
 */
class IdentificationController extends Controller
{
    /**
     * Affiche l'accueil
     *
     * @Route("/", name="amap_identification")
     * @Method({"GET", "POST"})
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
    	
        return $this->render('AdminBundle::Identification:login.html.twig');
    }
}
