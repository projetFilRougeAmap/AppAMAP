<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\CommandeProduit;
use AMAPBundle\Form\CommandeProduitType;

/**
 * CommandeProduit controller.
 *
 * @Route("/commandeproduit")
 */
class CommandeProduitController extends Controller
{
    /**
     * Lists all CommandeProduit entities.
     *
     * @Route("/", name="commandeproduit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandeProduits = $em->getRepository('AMAPBundle:CommandeProduit')->findAll();

        return $this->render('commandeproduit/index.html.twig', array(
            'commandeProduits' => $commandeProduits,
        ));
    }

    /**
     * Creates a new CommandeProduit entity.
     *
     * @Route("/new", name="commandeproduit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commandeProduit = new CommandeProduit();
        $form = $this->createForm('AMAPBundle\Form\CommandeProduitType', $commandeProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commandeProduit);
            $em->flush();

            return $this->redirectToRoute('commandeproduit_show', array('id' => $commandeProduit->getId()));
        }

        return $this->render('commandeproduit/new.html.twig', array(
            'commandeProduit' => $commandeProduit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CommandeProduit entity.
     *
     * @Route("/{id}", name="commandeproduit_show")
     * @Method("GET")
     */
    public function showAction(CommandeProduit $commandeProduit)
    {
        $deleteForm = $this->createDeleteForm($commandeProduit);

        return $this->render('commandeproduit/show.html.twig', array(
            'commandeProduit' => $commandeProduit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CommandeProduit entity.
     *
     * @Route("/{id}/edit", name="commandeproduit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CommandeProduit $commandeProduit)
    {
        $deleteForm = $this->createDeleteForm($commandeProduit);
        $editForm = $this->createForm('AMAPBundle\Form\CommandeProduitType', $commandeProduit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commandeProduit);
            $em->flush();

            return $this->redirectToRoute('commandeproduit_edit', array('id' => $commandeProduit->getId()));
        }

        return $this->render('commandeproduit/edit.html.twig', array(
            'commandeProduit' => $commandeProduit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CommandeProduit entity.
     *
     * @Route("/{id}", name="commandeproduit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CommandeProduit $commandeProduit)
    {
        $form = $this->createDeleteForm($commandeProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commandeProduit);
            $em->flush();
        }

        return $this->redirectToRoute('commandeproduit_index');
    }

    /**
     * Creates a form to delete a CommandeProduit entity.
     *
     * @param CommandeProduit $commandeProduit The CommandeProduit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommandeProduit $commandeProduit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commandeproduit_delete', array('id' => $commandeProduit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
