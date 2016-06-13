<?php

namespace AMAPBundle\Controller;

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
 * @Route("/produits")
 */
class ProduitsController extends Controller
{
    /**
     * Affiche tous les produits
     *
     * @Route("/", name="produits_index")
     * @Method({"GET"})
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AdminBundle:Produit')->findAll();

        return $this->render('AMAPBundle:Produits:produits.html.twig', array(
            'produits' => $produits,
        ));
    }
}
