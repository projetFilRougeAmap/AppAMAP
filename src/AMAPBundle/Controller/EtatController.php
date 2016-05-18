<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\Etat;
use AMAPBundle\Form\EtatType;

/**
 * Etat controller.
 *
 * @Route("/etat")
 */
class EtatController extends Controller
{
    /**
     * Lists all Etat entities.
     *
     * @Route("/", name="etat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etats = $em->getRepository('AMAPBundle:Etat')->findAll();

        return $this->render('etat/index.html.twig', array(
            'etats' => $etats,
        ));
    }

    /**
     * Creates a new Etat entity.
     *
     * @Route("/new", name="etat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etat = new Etat();
        $form = $this->createForm('AMAPBundle\Form\EtatType', $etat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etat);
            $em->flush();

            return $this->redirectToRoute('etat_show', array('id' => $etat->getId()));
        }

        return $this->render('etat/new.html.twig', array(
            'etat' => $etat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etat entity.
     *
     * @Route("/{id}", name="etat_show")
     * @Method("GET")
     */
    public function showAction(Etat $etat)
    {
        $deleteForm = $this->createDeleteForm($etat);

        return $this->render('etat/show.html.twig', array(
            'etat' => $etat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etat entity.
     *
     * @Route("/{id}/edit", name="etat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etat $etat)
    {
        $deleteForm = $this->createDeleteForm($etat);
        $editForm = $this->createForm('AMAPBundle\Form\EtatType', $etat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etat);
            $em->flush();

            return $this->redirectToRoute('etat_edit', array('id' => $etat->getId()));
        }

        return $this->render('etat/edit.html.twig', array(
            'etat' => $etat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Etat entity.
     *
     * @Route("/{id}", name="etat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etat $etat)
    {
        $form = $this->createDeleteForm($etat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etat);
            $em->flush();
        }

        return $this->redirectToRoute('etat_index');
    }

    /**
     * Creates a form to delete a Etat entity.
     *
     * @param Etat $etat The Etat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etat $etat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etat_delete', array('id' => $etat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
