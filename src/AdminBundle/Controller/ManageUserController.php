<?php

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Util\Debug;

/**
 * User controller.
 *
 * @Route("/ManageUser")
 */
class ManageUserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AdminBundle:User')->findAll();

        return $this->render('AdminBundle:User:index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new User entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if (isset($_POST['nom'])&&isset($_POST['prenom'])&& isset($_POST['email'])
        		&& isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password']['first'])
        		&& isset($_POST['password']['second'])&& isset($_POST['role'])) {
        	$userManager = $this->get('fos_user.user_manager');
        	$user = $userManager->createUser();
        	
        	$user->addRole($_POST['role']);
        	$user->setEmail($_POST['email']);
        	$user->setUsername($_POST['username']);
        	$user->setPlainPassword($_POST['password']['first']);
        	$user->setEnabled(true);
        	$user->setNom($_POST['nom']);
        	$user->setPrenom($_POST['prenom']);
        	$userManager->updateUser($user);
        	$this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('user_index', array('id' => $user->getId()));
        }

        return $this->render('AdminBundle:User:new.html.twig');
    }
    
   
    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('AdminBundle:User:show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        if (isset($_POST['nom'])&&isset($_POST['prenom'])&& isset($_POST['email'])
        		&& isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['role'])) {
        			$userManager = $this->get('fos_user.user_manager');
        			
        			foreach ($user->getRoles() as $r){
        				$user->removeRole($r);
        			}
        			$user->addRole($_POST['role']);
        			$user->setEmail($_POST['email']);
        			$user->setUsername($_POST['username']);
        			if(!empty($_POST['password']['first'])){
        				$user->setPlainPassword($_POST['password']['first']);
        			}
        			$user->setNom($_POST['nom']);
        			$user->setPrenom($_POST['prenom']);
        			$userManager->updateUser($user,false);
        			$this->getDoctrine()->getManager()->flush();
        			
        		}
        return $this->render('AdminBundle:User:edit.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
