<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\TypePanier;
use AMAPBundle\Form\TypePanierType;

/**
 * TypePanier controller.
 *
 * @Route("/typepanier")
 */
class TypePanierController extends Controller
{
    /**
     * Lists all TypePanier entities.
     *
     * @Route("/", name="typepanier_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typePaniers = $em->getRepository('AMAPBundle:TypePanier')->findAll();

        return $this->render('typepanier/index.html.twig', array(
            'typePaniers' => $typePaniers,
        ));
    }

    /**
     * Creates a new TypePanier entity.
     *
     * @Route("/new", name="typepanier_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typePanier = new TypePanier();
        $form = $this->createForm('AMAPBundle\Form\TypePanierType', $typePanier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typePanier);
            $em->flush();

            return $this->redirectToRoute('typepanier_show', array('id' => $typePanier->getId()));
        }

        return $this->render('typepanier/new.html.twig', array(
            'typePanier' => $typePanier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypePanier entity.
     *
     * @Route("/{id}", name="typepanier_show")
     * @Method("GET")
     */
    public function showAction(TypePanier $typePanier)
    {
        $deleteForm = $this->createDeleteForm($typePanier);

        return $this->render('typepanier/show.html.twig', array(
            'typePanier' => $typePanier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypePanier entity.
     *
     * @Route("/{id}/edit", name="typepanier_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypePanier $typePanier)
    {
        $deleteForm = $this->createDeleteForm($typePanier);
        $editForm = $this->createForm('AMAPBundle\Form\TypePanierType', $typePanier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typePanier);
            $em->flush();

            return $this->redirectToRoute('typepanier_edit', array('id' => $typePanier->getId()));
        }

        return $this->render('typepanier/edit.html.twig', array(
            'typePanier' => $typePanier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypePanier entity.
     *
     * @Route("/{id}", name="typepanier_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypePanier $typePanier)
    {
        $form = $this->createDeleteForm($typePanier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typePanier);
            $em->flush();
        }

        return $this->redirectToRoute('typepanier_index');
    }

    /**
     * Creates a form to delete a TypePanier entity.
     *
     * @param TypePanier $typePanier The TypePanier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypePanier $typePanier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typepanier_delete', array('id' => $typePanier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
