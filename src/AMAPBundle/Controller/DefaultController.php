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
 * @Route("/")
 */
class DefaultController extends Controller
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
}
