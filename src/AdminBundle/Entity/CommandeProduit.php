<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeProduit
 *
 * @ORM\Table(name="commande_produit")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CommandeProduitRepository")
 */
class CommandeProduit
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
     * @var int
     *
     * @ORM\Column(name="quantiteProduit", type="integer")
     */
    private $quantiteProduit;
    
    /**
    * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Commande", inversedBy="commandeProduit")
    */
    private $commandes;
    
    /**
    * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit", inversedBy="commandeProduit")
    */
    private $produits;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantiteProduit
     *
     * @param integer $quantiteProduit
     *
     * @return CommandeProduit
     */
    public function setQuantiteProduit($quantiteProduit)
    {
        $this->quantiteProduit = $quantiteProduit;

        return $this;
    }

    /**
     * Get quantiteProduit
     *
     * @return integer
     */
    public function getQuantiteProduit()
    {
        return $this->quantiteProduit;
    }

    /**
     * Set commandes
     *
     * @param \AdminBundle\Entity\Commande $commandes
     *
     * @return CommandeProduit
     */
    public function setCommandes(\AdminBundle\Entity\Commande $commandes = null)
    {
        $this->commandes = $commandes;

        return $this;
    }

    /**
     * Get commandes
     *
     * @return \AdminBundle\Entity\Commande
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Set produits
     *
     * @param \AdminBundle\Entity\Produit $produits
     *
     * @return CommandeProduit
     */
    public function setProduits(\AdminBundle\Entity\Produit $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \AdminBundle\Entity\Produit
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
