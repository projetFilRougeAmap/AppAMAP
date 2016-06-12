<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Entrepot;
use AdminBundle\Form\EntrepotType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entrepot controller.
 *
 * @Route("/Entrepot")
 */
class EntrepotController extends Controller
{
    /**
     * Lists all Entrepot entities.
     *
     * @Route("/", name="Entrepot_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entrepots = $em->getRepository('AdminBundle:Entrepot')->findAll();

        return $this->render('AdminBundle:Entrepot:index.html.twig', array(
            'entrepots' => $entrepots,
        ));
    }

    /**
     * Creates a new Entrepot entity.
     *
     * @Route("/new", name="Entrepot_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $entrepot = new Entrepot();
        $form = $this->createForm('AdminBundle\Form\EntrepotType', $entrepot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->persist($entrepot->getAdresse());
            $em->flush();

            return $this->redirectToRoute('Entrepot_index');
        }

        return $this->render('AdminBundle:Entrepot:new.html.twig', array(
            'entrepot' => $entrepot,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing Entrepot entity.
     *
     * @Route("/{id}/edit", name="Entrepot_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Entrepot $entrepot)
    {
        $deleteForm = $this->createDeleteForm($entrepot);
        $editForm = $this->createForm('AdminBundle\Form\EntrepotType', $entrepot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->flush();

            return $this->redirectToRoute('Entrepot_edit', array('id' => $entrepot->getId()));
        }

        return $this->render('AdminBundle:Entrepot:edit.html.twig', array(
            'entrepot' => $entrepot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Entrepot entity.
     *
     * @Route("/{id}/delete", name="Entrepot_delete")
     */
    public function deleteAction(Request $request, Entrepot $entrepot)
    {
     
           $em = $this->getDoctrine()->getManager();
           
           $em->remove($entrepot);
           try{
           	$em->flush();
           }catch(\Exception $e){
           	
           }

        return $this->redirectToRoute('Entrepot_index');
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
            ->setAction($this->generateUrl('Entrepot_delete', array('id' => $entrepot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
    
    /**
     * Creates a form to delete a Entrepot entity.
     *
     * @Route("/recupVille", name="Entrepot_recupVille",options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function recupVilleAction()
    {
    	$res=array();
    	if(!empty($_GET) && !empty($_GET['term'])){
    		
	    	$searchValue = $_GET['term'];
	    	
	    	$servername = "127.0.0.1";
	    	$username = "root";
	    	$password = "F3SbXX7JiPwZb2xE";
	    	$dbname = "symfony";
	    	
	    	// Create connection
	    	$conn = mysqli_connect($servername, $username, $password, $dbname);
	    	// Check connection
	    	if ($conn->connect_error) {
	    		die("Connection failed: " . mysqli_connect_error());
	    	}
	    	
	    	$sql = "SELECT distinct `ville_nom` FROM `villes`  where `ville_nom` like '".$searchValue."%' limit 10";
	    	$result = mysqli_query($conn, $sql);
	    	if (mysqli_num_rows($result) > 0) {
	    		// output data of each row
	    		
	    		while($row = mysqli_fetch_assoc($result)) {
	    			$res[]=$row['ville_nom'];
	    			
	    		}
	    	}
    	}
    	return new JsonResponse($res);
    }
    
    /**
     * Creates a form to delete a Entrepot entity.
     *
     * @Route("/setCP", name="Entrepot_setCP",options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function setCPAction()
    {
    	$res="";
    	if(!empty($_POST) && !empty($_POST['ville'])){
	    	$searchValue = $_POST['ville'];
	    	 
	    	$servername = "127.0.0.1";
	    	$username = "root";
	    	$password = "F3SbXX7JiPwZb2xE";
	    	$dbname = "symfony";
	    	 
	    	// Create connection
	    	$conn = mysqli_connect($servername, $username, $password, $dbname);
	    	// Check connection
	    	if ($conn->connect_error) {
	    		die("Connection failed: " . mysqli_connect_error());
	    	}
	    	
	    	$sql = "SELECT `ville_code_postal` FROM `villes`  where `ville_nom` like '".$searchValue."%' limit 1";
	    	$result = mysqli_query($conn, $sql);
	    	if (mysqli_num_rows($result) > 0) {
	    		// output data of each row
	    
	    		$res = mysqli_fetch_assoc($result);
	    		$res= $res['ville_code_postal'];
	    	}
	    	mysqli_close($conn);
    	}
    	return new JsonResponse($res);
    }
    

}
