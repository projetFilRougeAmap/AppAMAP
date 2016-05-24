<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Produit;
use AdminBundle\Form\ProduitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
* Produit controller.
*
* @Route("/gestionProduits")
*/
class GestionProduitsController extends Controller
{
    
    /**
     * Lists all Produit entities.
     *
     * @Route("/", name="gestionProduits_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AdminBundle:Produit')->findAll();

        return $this->render('AdminBundle:Produit:index.html.twig', array(
            'produits' => $produits,
        ));
    }

    /**
     * Creates a new Produit entity.
     *
     * @Route("/new", name="gestionProduits_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $produit = new Produit();
        $form = $this->createForm('AdminBundle\Form\ProduitType', $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('gestionProduits_show', array('id' => $produit->getId()));
        }

        return $this->render('AdminBundle:Produit:new.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Produit entity.
     *
     * @Route("/{id}", name="gestionProduits_show")
     * @Method("GET")
     */
    public function showAction(Produit $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);

        return $this->render('AdminBundle:Produit:show.html.twig', array(
            'produit' => $produit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produit entity.
     *
     * @Route("/{id}/edit", name="gestionProduits_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Produit $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);
        $editForm = $this->createForm('AdminBundle\Form\ProduitType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('gestionProduits_edit', array('id' => $produit->getId()));
        }

        return $this->render('AdminBundle:Produit:edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produit entity.
     *
     * @Route("/{id}/delete", name="gestionProduits_delete")
     */
    public function deleteAction(Request $request, Produit $produit)
{
        $em = $this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('gestionProduits_index');
    }

    /**
     * Creates a form to delete a Produit entity.
     *
     * @param Produit $produit The Produit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produit $produit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionProduits_delete', array('id' => $produit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
}