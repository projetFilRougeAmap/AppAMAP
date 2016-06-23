<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\Production;
use AdminBundle\Form\StockType;
use AdminBundle\Entity\Stock;
use AdminBundle\Entity\Panier;
use AdminBundle\Entity\Entrepot;

/**
 * Stock controller.
 *
 * @Route("/stock")
 */
class StockController extends Controller
{
    /**
     * Lists all Stock entities.
     *
     * @Route("/", name="stock_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stocks = $em->getRepository('AdminBundle:Stock')->findAll();

        return $this->render('AdminBundle:Stock:index.html.twig', array(
            'stocks' => $stocks,
        ));
    }

    /**
     * Creates a new Stock entity.
     *
     * @Route("/new", name="stock_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stock = new Stock();
        $form = $this->createForm('AdminBundle\Form\StockType', $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $existStock = $em->getRepository('AdminBundle:Stock')->findOneBy(array("produits" => $stock->getProduits(), "entrepot" => $stock->getEntrepot()));
          
            if ($existStock) {
                $existStock->setQuantite($stock->getQuantite() + $existStock->getQuantite());
                $existStock->setPoids($stock->getPoids() + $existStock->getPoids());
                $em->persist($existStock);
            } else {
                $em->persist($stock);
            }

            $em->flush();

            return $this->redirectToRoute('stock_index');
        }

        return $this->render('AdminBundle:Stock:new.html.twig', array(
            'stock' => $stock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Stock entity.
     *
     * @Route("/{id}", name="stock_show")
     * @Method("GET")
     */
    public function showAction(Stock $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);

        return $this->render('AdminBundle:Stock:show.html.twig', array(
            'stock' => $stock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Stock entity.
     *
     * @Route("/{id}/edit", name="stock_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stock $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);
        $editForm = $this->createForm('AdminBundle\Form\StockType', $stock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stock_index');
        }

        return $this->render('AdminBundle:Stock:edit.html.twig', array(
            'stock' => $stock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Stock entity.
     *
     * @Route("/{id}/delete", name="stock_delete")
     */
    public function deleteAction(Request $request, Stock $stock)
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($stock);
            $em->flush();
        }catch(\Exception $e){
        	
        }

        return $this->redirectToRoute('stock_index');
    }

    /**
     * Creates a form to delete a Stock entity.
     *
     * @param Production $stock The Stock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stock $stock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stock_delete', array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    

    /**
     * Finds and displays a Stock entity.
     *
     * @Route("/RetirerPanier/", name="stock_retirer")
     * @Method({"GET", "POST"})
     */
    public function retirerPanierAction(Request $request)
    {
    	 $form = $this->createForm('AdminBundle\Form\RetirerPanierType');
    	 if ($_POST) {
    	 	$em = $this->getDoctrine()->getManager();
    	 	$entrepot = $em->getRepository('AdminBundle:Entrepot')->find($_POST['retirer_panier']['entrepot']);
    	 	$panier = $em->getRepository('AdminBundle:Panier')->find($_POST['retirer_panier']['panier']);
    	 	
    	 	foreach ($panier->getPanierProduit() as $p){
    	 		$em->getRepository('AdminBundle:Stock')->updateStock($p->getPoidProduit(),$p->getProduits(),$entrepot);
    	 		
    	 	}
//     	 	$em->persist($stock);
//     	 	$em->flush();
    	 
    	 	return $this->redirectToRoute('stock_index');
    	 }
    	return $this->render('AdminBundle:Stock:retirerPanier.html.twig', array('form'=>$form->createView()));
    }
}
