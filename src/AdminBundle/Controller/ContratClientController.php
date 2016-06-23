<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\ContratClient;
use AdminBundle\Form\ContratClientType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            'contratClients' => $contratCLients,
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
            $contratCLient->setNbPanier($contratCLient->getNbPanierPrevu());
            $em->persist($contratCLient);
            $em->flush();
            return $this->redirectToRoute('contratclient_index');
        }

        return $this->render('AdminBundle:ContratClient:new.html.twig', array(
            'contratClient' => $contratCLient,
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
            'contratClient' => $contratCLient,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContratClient entity.
     *
     * @Route("/{id}/delete", name="contratclient_delete")
     */
    public function deleteAction(Request $request, ContratClient $contratCLient)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratCLient);
            $em->flush();
        }catch(\Exception $e){
            
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
    
    /**
     * Finds and displays a Stock entity.
     *
     * @Route("/RetirerPanier/{id}", name="contratclient_retirer")
     * @Method({"GET", "POST"})
     */
    public function retirerPanierAction(Request $request, ContratClient $contratCLient)
    {
    		$em = $this->getDoctrine()->getManager();
    		$form = $this->createFormBuilder()->add('panier', EntityType::class,
	    				array(
	    						'class' => 'AdminBundle:Panier',
	    						'choices' =>$contratCLient->getPaniers()
	    				)
	    			)
    				->add('entrepot',EntityType::class, 
            		array(
            				'class' => 'AdminBundle:Entrepot',
            		)
            )->getForm();
    		if($_POST){
    			if($contratCLient->getNbPanier()>0){
		    		$em = $this->getDoctrine()->getManager();
		    	 	$entrepot = $em->getRepository('AdminBundle:Entrepot')->find($_POST['form']['entrepot']);
		    	 	$panier = $em->getRepository('AdminBundle:Panier')->find($_POST['form']['panier']);
		    	 	
		    	 	foreach ($panier->getPanierProduit() as $p){
		    	 		$em->getRepository('AdminBundle:Stock')->updateStock($p->getPoidProduit(),$p->getProduits(),$entrepot);
		    	 		
		    	 	}	 	
		    	 	$contratCLient->setNbPanier($contratCLient->getNbPanier()-1);
		    	 	$em->persist($contratCLient);
		    	 	$em->flush();
	    	 	
    			}
    			return $this->redirectToRoute('contratclient_index');
    		}
    
    	return $this->render('AdminBundle:ContratClient:retirerPanier.html.twig', array('form'=>$form->createView()));
    }
}
