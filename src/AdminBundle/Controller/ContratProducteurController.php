<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\ContratProducteur;
use AdminBundle\Form\ContratProducteurType;

/**
 * ContratProducteur controller.
 *
 * @Route("/ContratProducteur")
 */
class ContratProducteurController extends Controller
{
    /**
     * Lists all ContratProducteur entities.
     *
     * @Route("/", name="contratproducteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contratProducteurs = $em->getRepository('AdminBundle:ContratProducteur')->findAll();

        return $this->render('AdminBundle:Contratproducteur:index.html.twig', array(
            'contratProducteurs' => $contratProducteurs,
        ));
    }

    /**
     * Creates a new ContratProducteur entity.
     *
     * @Route("/new", name="contratproducteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contratProducteur = new ContratProducteur();
        $form = $this->createForm('AdminBundle\Form\ContratProducteurType', $contratProducteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           
            $em->persist($contratProducteur);
            $em->flush();
            return $this->redirectToRoute('contratproducteur_index');
        }

        return $this->render('AdminBundle:Contratproducteur:new.html.twig', array(
            'contratProducteur' => $contratProducteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContratProducteur entity.
     *
     * @Route("/{id}", name="contratproducteur_show")
     * @Method("GET")
     */
    public function showAction(ContratProducteur $contratProducteur)
    {
        $deleteForm = $this->createDeleteForm($contratProducteur);

        return $this->render('AdminBundle:Contratproducteur:show.html.twig', array(
            'contratProducteur' => $contratProducteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContratProducteur entity.
     *
     * @Route("/{id}/edit", name="contratproducteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContratProducteur $contratProducteur)
    {
        $deleteForm = $this->createDeleteForm($contratProducteur);
        $editForm = $this->createForm('AdminBundle\Form\ContratProducteurType', $contratProducteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratProducteur);
            $em->flush();

            return $this->redirectToRoute('contratproducteur_edit', array('id' => $contratProducteur->getId()));
        }

        return $this->render('AdminBundle:Contratproducteur:edit.html.twig', array(
            'contratProducteur' => $contratProducteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContratProducteur entity.
     *
     * @Route("/{id}/delete", name="contratproducteur_delete")
     */
    public function deleteAction(Request $request, ContratProducteur $contratProducteur)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratProducteur);
            $em->flush();
        }catch(\Exception $e){
            
        }

        return $this->redirectToRoute('contratproducteur_index');
    }

    /**
     * Creates a form to delete a ContratProducteur entity.
     *
     * @param ContratProducteur $contratProducteur The ContratProducteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContratProducteur $contratProducteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratproducteur_delete', array('id' => $contratProducteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
