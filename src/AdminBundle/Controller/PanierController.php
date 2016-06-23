<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\Panier;
use AdminBundle\Form\PanierType;

/**
 * Panier controller.
 *
 * @Route("/Panier")
 */
class PanierController extends Controller
{
    /**
     * Lists all Panier entities.
     *
     * @Route("/", name="panier_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paniers = $em->getRepository('AdminBundle:Panier')->findAll();

        return $this->render('AdminBundle:Panier:index.html.twig', array(
            'paniers' => $paniers,
        ));
    }

    /**
     * Creates a new Panier entity.
     *
     * @Route("/new", name="panier_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $panier = new Panier();
        $form = $this->createForm('AdminBundle\Form\PanierType', $panier);
        $form->handleRequest($request);
		
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $panier->setDateDerniereModif(new \DateTime());
            foreach ($panier->getPanierProduit() as $p){
            	$p->setPaniers($panier);
            }
            $em->persist($panier);
            $em->flush();
           
            return $this->redirectToRoute('panier_index');
        }

        return $this->render('AdminBundle:Panier:new.html.twig', array(
            'panier' => $panier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Panier entity.
     *
     * @Route("/{id}", name="panier_show")
     * @Method("GET")
     */
    public function showAction(Panier $panier)
    {
        $deleteForm = $this->createDeleteForm($panier);

        return $this->render('AdminBundle:Panier:show.html.twig', array(
            'panier' => $panier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Panier entity.
     *
     * @Route("/{id}/edit", name="panier_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Panier $panier)
    {
        $deleteForm = $this->createDeleteForm($panier);
        $editForm = $this->createForm('AdminBundle\Form\PanierType', $panier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $panier->setDateDerniereModif(new \DateTime());
            $em->persist($panier);
            $em->flush();

            return $this->redirectToRoute('panier_edit', array('id' => $panier->getId()));
        }

        return $this->render('AdminBundle:Panier:edit.html.twig', array(
            'panier' => $panier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Panier entity.
     *
     * @Route("/{id}/delete", name="panier_delete")
     */
    public function deleteAction(Request $request, Panier $panier)
    {
    	try{
    		
    
        $em = $this->getDoctrine()->getManager();
        $em->remove($panier);
        $em->flush();
    	}catch(\Exception $e){
    		
    	}

        return $this->redirectToRoute('panier_index');
    }

    /**
     * Creates a form to delete a Panier entity.
     *
     * @param Panier $panier The Panier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Panier $panier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('panier_delete', array('id' => $panier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
