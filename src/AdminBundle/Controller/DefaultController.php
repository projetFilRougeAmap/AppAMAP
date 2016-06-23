<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * Affiche l'accueil
     *
     * @Route("/", name="admin_homepage")
     * @Method({"GET", "POST"})
     */
    public function indexAction()
    {
    	return $this->redirectToRoute('stock_index');
//         return $this->render('AdminBundle:Default:index.html.twig');
    }
}
