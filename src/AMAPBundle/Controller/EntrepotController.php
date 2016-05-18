<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\Entrepot;
use AMAPBundle\Form\EntrepotType;

/**
 * Entrepot controller.
 *
 * @Route("/entrepot")
 */
class EntrepotController extends Controller
{
    /**
     * Lists all Entrepot entities.
     *
     * @Route("/", name="entrepot_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entrepots = $em->getRepository('AMAPBundle:Entrepot')->findAll();

        return $this->render('entrepot/index.html.twig', array(
            'entrepots' => $entrepots,
        ));
    }

    /**
     * Creates a new Entrepot entity.
     *
     * @Route("/new", name="entrepot_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $entrepot = new Entrepot();
        $form = $this->createForm('AMAPBundle\Form\EntrepotType', $entrepot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->flush();

            return $this->redirectToRoute('entrepot_show', array('id' => $entrepot->getId()));
        }

        return $this->render('entrepot/new.html.twig', array(
            'entrepot' => $entrepot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Entrepot entity.
     *
     * @Route("/{id}", name="entrepot_show")
     * @Method("GET")
     */
    public function showAction(Entrepot $entrepot)
    {
        $deleteForm = $this->createDeleteForm($entrepot);

        return $this->render('entrepot/show.html.twig', array(
            'entrepot' => $entrepot,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Entrepot entity.
     *
     * @Route("/{id}/edit", name="entrepot_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Entrepot $entrepot)
    {
        $deleteForm = $this->createDeleteForm($entrepot);
        $editForm = $this->createForm('AMAPBundle\Form\EntrepotType', $entrepot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->flush();

            return $this->redirectToRoute('entrepot_edit', array('id' => $entrepot->getId()));
        }

        return $this->render('entrepot/edit.html.twig', array(
            'entrepot' => $entrepot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Entrepot entity.
     *
     * @Route("/{id}", name="entrepot_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Entrepot $entrepot)
    {
        $form = $this->createDeleteForm($entrepot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entrepot);
            $em->flush();
        }

        return $this->redirectToRoute('entrepot_index');
    }

    /**
     * Creates a form to delete a Entrepot entity.
     *
     * @param Entrepot $entrepot The Entrepot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Entrepot $entrepot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entrepot_delete', array('id' => $entrepot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
