<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\Livraison;
use AMAPBundle\Form\LivraisonType;

/**
 * Livraison controller.
 *
 * @Route("/livraison")
 */
class LivraisonController extends Controller
{
    /**
     * Lists all Livraison entities.
     *
     * @Route("/", name="livraison_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('AMAPBundle:Livraison')->findAll();

        return $this->render('livraison/index.html.twig', array(
            'livraisons' => $livraisons,
        ));
    }

    /**
     * Creates a new Livraison entity.
     *
     * @Route("/new", name="livraison_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $livraison = new Livraison();
        $form = $this->createForm('AMAPBundle\Form\LivraisonType', $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('livraison_show', array('id' => $livraison->getId()));
        }

        return $this->render('livraison/new.html.twig', array(
            'livraison' => $livraison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Livraison entity.
     *
     * @Route("/{id}", name="livraison_show")
     * @Method("GET")
     */
    public function showAction(Livraison $livraison)
    {
        $deleteForm = $this->createDeleteForm($livraison);

        return $this->render('livraison/show.html.twig', array(
            'livraison' => $livraison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Livraison entity.
     *
     * @Route("/{id}/edit", name="livraison_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Livraison $livraison)
    {
        $deleteForm = $this->createDeleteForm($livraison);
        $editForm = $this->createForm('AMAPBundle\Form\LivraisonType', $livraison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('livraison_edit', array('id' => $livraison->getId()));
        }

        return $this->render('livraison/edit.html.twig', array(
            'livraison' => $livraison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Livraison entity.
     *
     * @Route("/{id}", name="livraison_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Livraison $livraison)
    {
        $form = $this->createDeleteForm($livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livraison);
            $em->flush();
        }

        return $this->redirectToRoute('livraison_index');
    }

    /**
     * Creates a form to delete a Livraison entity.
     *
     * @param Livraison $livraison The Livraison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livraison $livraison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livraison_delete', array('id' => $livraison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
