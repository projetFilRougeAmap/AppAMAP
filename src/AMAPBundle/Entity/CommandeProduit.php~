<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeProduit
 *
 * @ORM\Table(name="commande_produit")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\CommandeProduitRepository")
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
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Commande", inversedBy="commandeProduit")
    */
    private $commandes;
    
    /**
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Produit", inversedBy="commandeProduit")
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
     * @param \AMAPBundle\Entity\Commande $commandes
     *
     * @return CommandeProduit
     */
    public function setCommandes(\AMAPBundle\Entity\Commande $commandes = null)
    {
        $this->commandes = $commandes;

        return $this;
    }

    /**
     * Get commandes
     *
     * @return \AMAPBundle\Entity\Commande
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Set produits
     *
     * @param \AMAPBundle\Entity\Produit $produits
     *
     * @return CommandeProduit
     */
    public function setProduits(\AMAPBundle\Entity\Produit $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \AMAPBundle\Entity\Produit
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
