<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Produit;


/**
 * Produit controller.
 *
 */
class HomeController extends Controller
{
    /**
     * Affiche l'accueil
     *
     * @Route("/", name="amap_homepage")
     * @Method({"GET", "POST"})
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
    	
        return $this->render('AdminBundle::Default:index.html.twig');
    }
}