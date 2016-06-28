<?php
namespace AdminBundle\Command;

use AdminBundle\Entity\CategorieProduit;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AdminBundle\Entity\TypePanier;
class InstallCommand extends ContainerAwareCommand
{
	protected function configure()
    {
        $this->setName('install:config');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em = $this->getContainer()->get('doctrine')->getManager();
		
		$cat1 = new CategorieProduit();
		$cat1->setLibelle("Fruits");
		
		$em->persist($cat1);
		
		$cat2 = new CategorieProduit();
		$cat2->setLibelle("Légumes");
		
		$em->persist($cat1);
		
		
		
		
		
		$typ1 = new TypePanier();
		$typ1->setLibelle("Grand Ete");
		
		$em->persist($typ1);
		
		
		$typ2 = new TypePanier();
		$typ2->setLibelle("Moyen Ete");
		
		$em->persist($typ2);
		
		$typ9 = new TypePanier();
		$typ9->setLibelle("Petit Ete");
		
		$em->persist($typ9);
		
		$typ3 = new TypePanier();
		$typ3->setLibelle("Grand Automne");
		
		$em->persist($typ3);
		
		$typ4 = new TypePanier();
		$typ4->setLibelle("Moyen Automne");
		
		$em->persist($typ4);
		
		$typ5 = new CategorieProduit();
		$typ5->setLibelle("Petit Automne");
		
		$em->persist($typ5);
		
		$typ6 = new CategorieProduit();
		$typ6->setLibelle("Grand Hiver");
		
		$em->persist($typ6);
		
		$typ7 = new CategorieProduit();
		$typ7->setLibelle("Moyen Hiver");
		
		$em->persist($typ7);
		
		$typ8 = new CategorieProduit();
		$typ8->setLibelle("Petit Hiver");
		
		$em->persist($typ8);
		
		$typ10 = new CategorieProduit();
		$typ10->setLibelle("Grand Prinptemps");
		
		$em->persist($typ10);
		
		$typ11 = new CategorieProduit();
		$typ11->setLibelle("Moyen Printemps");
		
		$em->persist($typ11);
		
		$typ12 = new TypePanier();
		$typ12->setLibelle("Petit Primtemps");
		
		$em->persist($typ12);
		
	
		$userManager = $this->getContainer()->get('fos_user.user_manager');
        $user = $userManager->createUser();
         
        $user->addRole('ROLE_ADMIN');
        $user->setEmail('admin@gmail.com');
        $user->setUsername('admin');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setNom('Admin');
        $user->setPrenom('Admin');
        $userManager->updateUser($user);
        $em->flush();
		
        echo "Installation terminée";
		
		
		
    }
}
