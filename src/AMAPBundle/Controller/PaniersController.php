<?php

namespace AMAPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Panier;
use AdminBundle\Entity\TypePanier;


/**
 * Produit controller.
 *
 * @Route("/paniers")
 */
class PaniersController extends Controller
{
    /**
     * Affiche tous les paniers
     *
     * @Route("/", name="paniers_index")
     * @Method({"GET"})
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

        $paniers = $em->getRepository('AdminBundle:Panier')->findAll();

        return $this->render('AMAPBundle:Paniers:index.html.twig', array(
            'paniers' => $paniers,
        ));
    }
}
