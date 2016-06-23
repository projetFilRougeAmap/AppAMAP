<?php

namespace AMAPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AMAPBundle\Entity\Produit;


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
        return $this->render('AMAPBundle:Default:index.html.twig');
    }
    
    
    /**
     * Affiche la page de description de l'amap
     *
     * @Route("/AMAP", name="amap_description")
     * @Method({"GET", "POST"})
     */
    public function amapAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        return $this->render('AMAPBundle:Default:amap.html.twig');
    }
    /**
     * Affiche la page de contact
     *
     * @Route("/Contact", name="amap_contact")
     */
    public function contactAction()
    {
    	return $this->render('AMAPBundle:Default:contact.html.twig');
    }
    
    
}
