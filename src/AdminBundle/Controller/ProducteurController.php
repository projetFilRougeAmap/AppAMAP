<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\Producteur;
use AdminBundle\Form\ProducteurType;
use AdminBundle\Entity\Production;

/**
 * Producteur controller.
 *
 * @Route("/Producteur")
 */
class ProducteurController extends Controller
{
    /**
     * Lists all Producteur entities.
     *
     * @Route("/", name="producteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $producteurs = $em->getRepository('AdminBundle:Producteur')->findAll();
	
        return $this->render('AdminBundle:Producteur:index.html.twig', array(
            'producteurs' => $producteurs,
        ));
    }

    /**
     * Creates a new Producteur entity.
     *
     * @Route("/new", name="producteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
    	
        $producteur = new Producteur();
        $form = $this->createForm('AdminBundle\Form\ProducteurType', $producteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           
             
            $producteur->getUser()->addRole("ROLE_PRODUCTEUR");
            var_dump($producteur->getUser());
            $em->persist($producteur->getUser());
            $em->persist($producteur);
            $em->flush();
            return $this->redirectToRoute('producteur_index', array('id' => $producteur->getId()));
        }

        return $this->render('AdminBundle:Producteur:new.html.twig', array(
            'producteur' => $producteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Producteur entity.
     *
     * @Route("/edit", name="producteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$producteur = $em->getRepository('AdminBundle:Producteur')->find($_GET['id']);
    	
        $deleteForm = $this->createDeleteForm($producteur);
        $editForm = $this->createForm('AdminBundle\Form\ProducteurType', $producteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producteur);
            $em->flush();

            return $this->redirectToRoute('producteur_edit', array('id' => $producteur->getId()));
        }

        return $this->render('AdminBundle:Producteur:edit.html.twig', array(
            'producteur' => $producteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Producteur entity.
     *
     * @Route("/{id}/delete", name="producteur_delete")
     */
    public function deleteAction(Request $request, Producteur $producteur)
    {
    	try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($producteur);
            $em->remove($producteur->getUser());
            $em->flush();
        }catch(\Exception $e){
        	
        }

        return $this->redirectToRoute('producteur_index');
    }

    /**
     * Creates a form to delete a Producteur entity.
     *
     * @param Producteur $producteur The Producteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producteur $producteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producteur_delete', array('id' => $producteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Lists all Producteur entities.
     *
     * @Route("/AjouterProduits/{id}", name="producteur_add_product")
     */
    public function addProduitsAction(Request $request,$id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$producteur = $em->getRepository('AdminBundle:Producteur')->find($id);
    
    	$production = new Production();
    	$form = $this->createForm('AdminBundle\Form\ProductionType', $production);
    	$form->handleRequest($request);
    	
    	if ($form->isSubmitted() && $form->isValid()) {
    		$production->setProducteur($producteur);
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($production);
    		$em->flush();
    	
    		return $this->redirectToRoute('producteur_index', array('id' => $production->getId()));
    	}
    	
    	return $this->render('AdminBundle:Producteur:addProducts.html.twig', array('producteur'=>$producteur,'production' => $production,
    			'form' => $form->createView()
    	));
    }
    
    /**
     * Finds and displays a Producteur entity.
     *
     * @Route("/{id}", name="producteur_show")
     * @Method("GET")
     */
    public function showAction(Producteur $producteur)
    {
    	$deleteForm = $this->createDeleteForm($producteur);
    	return $this->render('AdminBundle:Producteur:show.html.twig', array(
    			'producteur' => $producteur,
            'delete_form' => $deleteForm->createView(),
    	));
    }
}
