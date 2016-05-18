<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\EtatCommande;
use AMAPBundle\Form\EtatCommandeType;

/**
 * EtatCommande controller.
 *
 * @Route("/etatcommande")
 */
class EtatCommandeController extends Controller
{
    /**
     * Lists all EtatCommande entities.
     *
     * @Route("/", name="etatcommande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etatCommandes = $em->getRepository('AMAPBundle:EtatCommande')->findAll();

        return $this->render('etatcommande/index.html.twig', array(
            'etatCommandes' => $etatCommandes,
        ));
    }

    /**
     * Creates a new EtatCommande entity.
     *
     * @Route("/new", name="etatcommande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etatCommande = new EtatCommande();
        $form = $this->createForm('AMAPBundle\Form\EtatCommandeType', $etatCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etatCommande);
            $em->flush();

            return $this->redirectToRoute('etatcommande_show', array('id' => $etatCommande->getId()));
        }

        return $this->render('etatcommande/new.html.twig', array(
            'etatCommande' => $etatCommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EtatCommande entity.
     *
     * @Route("/{id}", name="etatcommande_show")
     * @Method("GET")
     */
    public function showAction(EtatCommande $etatCommande)
    {
        $deleteForm = $this->createDeleteForm($etatCommande);

        return $this->render('etatcommande/show.html.twig', array(
            'etatCommande' => $etatCommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtatCommande entity.
     *
     * @Route("/{id}/edit", name="etatcommande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EtatCommande $etatCommande)
    {
        $deleteForm = $this->createDeleteForm($etatCommande);
        $editForm = $this->createForm('AMAPBundle\Form\EtatCommandeType', $etatCommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etatCommande);
            $em->flush();

            return $this->redirectToRoute('etatcommande_edit', array('id' => $etatCommande->getId()));
        }

        return $this->render('etatcommande/edit.html.twig', array(
            'etatCommande' => $etatCommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EtatCommande entity.
     *
     * @Route("/{id}", name="etatcommande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EtatCommande $etatCommande)
    {
        $form = $this->createDeleteForm($etatCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etatCommande);
            $em->flush();
        }

        return $this->redirectToRoute('etatcommande_index');
    }

    /**
     * Creates a form to delete a EtatCommande entity.
     *
     * @param EtatCommande $etatCommande The EtatCommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EtatCommande $etatCommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etatcommande_delete', array('id' => $etatCommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
