<?php

namespace AMAPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AMAPBundle\Entity\PaiementCommande;
use AMAPBundle\Form\PaiementCommandeType;

/**
 * PaiementCommande controller.
 *
 * @Route("/paiementcommande")
 */
class PaiementCommandeController extends Controller
{
    /**
     * Lists all PaiementCommande entities.
     *
     * @Route("/", name="paiementcommande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paiementCommandes = $em->getRepository('AMAPBundle:PaiementCommande')->findAll();

        return $this->render('paiementcommande/index.html.twig', array(
            'paiementCommandes' => $paiementCommandes,
        ));
    }

    /**
     * Creates a new PaiementCommande entity.
     *
     * @Route("/new", name="paiementcommande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $paiementCommande = new PaiementCommande();
        $form = $this->createForm('AMAPBundle\Form\PaiementCommandeType', $paiementCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paiementCommande);
            $em->flush();

            return $this->redirectToRoute('paiementcommande_show', array('id' => $paiementCommande->getId()));
        }

        return $this->render('paiementcommande/new.html.twig', array(
            'paiementCommande' => $paiementCommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PaiementCommande entity.
     *
     * @Route("/{id}", name="paiementcommande_show")
     * @Method("GET")
     */
    public function showAction(PaiementCommande $paiementCommande)
    {
        $deleteForm = $this->createDeleteForm($paiementCommande);

        return $this->render('paiementcommande/show.html.twig', array(
            'paiementCommande' => $paiementCommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PaiementCommande entity.
     *
     * @Route("/{id}/edit", name="paiementcommande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PaiementCommande $paiementCommande)
    {
        $deleteForm = $this->createDeleteForm($paiementCommande);
        $editForm = $this->createForm('AMAPBundle\Form\PaiementCommandeType', $paiementCommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paiementCommande);
            $em->flush();

            return $this->redirectToRoute('paiementcommande_edit', array('id' => $paiementCommande->getId()));
        }

        return $this->render('paiementcommande/edit.html.twig', array(
            'paiementCommande' => $paiementCommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PaiementCommande entity.
     *
     * @Route("/{id}", name="paiementcommande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PaiementCommande $paiementCommande)
    {
        $form = $this->createDeleteForm($paiementCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paiementCommande);
            $em->flush();
        }

        return $this->redirectToRoute('paiementcommande_index');
    }

    /**
     * Creates a form to delete a PaiementCommande entity.
     *
     * @param PaiementCommande $paiementCommande The PaiementCommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PaiementCommande $paiementCommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paiementcommande_delete', array('id' => $paiementCommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
