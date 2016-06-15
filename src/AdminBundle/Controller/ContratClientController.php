<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\ContratClient;
use AdminBundle\Form\ContratClientType;

/**
 * ContratClient controller.
 *
 * @Route("/ContratClient")
 */
class ContratClientController extends Controller
{
    /**
     * Lists all ContratClient entities.
     *
     * @Route("/", name="contratclient_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contratCLients = $em->getRepository('AdminBundle:ContratClient')->findAll();

        return $this->render('AdminBundle:ContratClient:index.html.twig', array(
            'contratCLients' => $contratCLients,
        ));
    }

    /**
     * Creates a new ContratClient entity.
     *
     * @Route("/new", name="contratclient_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contratCLient = new ContratClient();
        $form = $this->createForm('AdminBundle\Form\ContratClientType', $contratCLient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratCLient);
            $em->flush();

            return $this->redirectToRoute('contratclient_show', array('id' => $contratCLient->getId()));
        }

        return $this->render('AdminBundle:ContratClient:new.html.twig', array(
            'contratCLient' => $contratCLient,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContratClient entity.
     *
     * @Route("/{id}", name="contratclient_show")
     * @Method("GET")
     */
    public function showAction(ContratClient $contratCLient)
    {
        $deleteForm = $this->createDeleteForm($contratCLient);

        return $this->render('AdminBundle:ContratClient:show.html.twig', array(
            'contratClient' => $contratCLient,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContratClient entity.
     *
     * @Route("/{id}/edit", name="contratclient_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContratClient $contratCLient)
    {
        $deleteForm = $this->createDeleteForm($contratCLient);
        $editForm = $this->createForm('AdminBundle\Form\ContratClientType', $contratCLient);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratCLient);
            $em->flush();

            return $this->redirectToRoute('contratclient_edit', array('id' => $contratCLient->getId()));
        }

        return $this->render('AdminBundle:ContratClient:edit.html.twig', array(
            'contratCLient' => $contratCLient,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContratClient entity.
     *
     * @Route("/{id}", name="contratclient_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContratClient $contratCLient)
    {
        $form = $this->createDeleteForm($contratCLient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratCLient);
            $em->flush();
        }

        return $this->redirectToRoute('contratclient_index');
    }

    /**
     * Creates a form to delete a ContratClient entity.
     *
     * @param ContratClient $contratCLient The ContratClient entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContratClient $contratCLient)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratclient_delete', array('id' => $contratCLient->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
