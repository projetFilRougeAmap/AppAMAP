<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\CategorieProduit;
use AMAPBundle\Form\CategorieProduitType;

/**
 * CategorieProduit controller.
 *
 * @Route("/categorieproduit")
 */
class CategorieProduitController extends Controller
{
    /**
     * Lists all CategorieProduit entities.
     *
     * @Route("/", name="categorieproduit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieProduits = $em->getRepository('AMAPBundle:CategorieProduit')->findAll();

        return $this->render('categorieproduit/index.html.twig', array(
            'categorieProduits' => $categorieProduits,
        ));
    }

    /**
     * Creates a new CategorieProduit entity.
     *
     * @Route("/new", name="categorieproduit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categorieProduit = new CategorieProduit();
        $form = $this->createForm('AMAPBundle\Form\CategorieProduitType', $categorieProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieProduit);
            $em->flush();

            return $this->redirectToRoute('categorieproduit_show', array('id' => $categorieProduit->getId()));
        }

        return $this->render('categorieproduit/new.html.twig', array(
            'categorieProduit' => $categorieProduit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CategorieProduit entity.
     *
     * @Route("/{id}", name="categorieproduit_show")
     * @Method("GET")
     */
    public function showAction(CategorieProduit $categorieProduit)
    {
        $deleteForm = $this->createDeleteForm($categorieProduit);

        return $this->render('categorieproduit/show.html.twig', array(
            'categorieProduit' => $categorieProduit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CategorieProduit entity.
     *
     * @Route("/{id}/edit", name="categorieproduit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategorieProduit $categorieProduit)
    {
        $deleteForm = $this->createDeleteForm($categorieProduit);
        $editForm = $this->createForm('AMAPBundle\Form\CategorieProduitType', $categorieProduit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieProduit);
            $em->flush();

            return $this->redirectToRoute('categorieproduit_edit', array('id' => $categorieProduit->getId()));
        }

        return $this->render('categorieproduit/edit.html.twig', array(
            'categorieProduit' => $categorieProduit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CategorieProduit entity.
     *
     * @Route("/{id}", name="categorieproduit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategorieProduit $categorieProduit)
    {
        $form = $this->createDeleteForm($categorieProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieProduit);
            $em->flush();
        }

        return $this->redirectToRoute('categorieproduit_index');
    }

    /**
     * Creates a form to delete a CategorieProduit entity.
     *
     * @param CategorieProduit $categorieProduit The CategorieProduit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieProduit $categorieProduit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieproduit_delete', array('id' => $categorieProduit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
