<?php

namespace AMAPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AMAPBundle\Entity\Produit;
class GestionProduitsController extends Controller
{
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $em =  $this->getDoctrine()->getManager();
        
        $form = $this->createFormBuilder()
                ->setMethod('POST') 
                ->add('libelleProduit', TextType::class)
                ->add('valider', SubmitType::class)
                ->getForm();
        
        if($form->handleRequest($request)->isSubmitted()){
            $prod = new Produit();
            $data = $form->getData();
            $prod->setLibelle($data['libelleProduit']);
            $em->persist($prod);
            $em->flush();     
        }
         
        $produit = $em->getRepository('AMAPBundle:Produit')
                ->findAll();
        
        return $this->render('AMAPBundle:GestionProduits:gestionProduits.html.twig', array('prod'=>$produit,'form'=>$form->createView()));
    }
}
