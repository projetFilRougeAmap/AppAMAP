<?php

namespace AMAPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AMAPBundle\Entity\Produit;
class DefaultController extends Controller
{
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        return $this->render('AMAPBundle:Default:index.html.twig');
    }
}
