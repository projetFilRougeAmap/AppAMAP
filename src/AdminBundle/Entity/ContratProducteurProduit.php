<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratClient
 *
 * @ORM\Table(name="contrat_producteur_produit")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ContratClientRepository")
 */
class ContratProducteurProduit
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit", inversedBy="contratProducteur")
	 * 
	 */
	private $produit;
	
	/**
	 * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\ContratProducteur", inversedBy="produits")
	 */
	private $contratProducteur;
	

	
	/**
	 * @var float
	 *
	 * @ORM\Column(name="poidProduit", type="float")
	 */
	private $poidProduit;
}
