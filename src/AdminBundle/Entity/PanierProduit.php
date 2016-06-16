<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier_produit")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\PanierRepository")
 */
class PanierProduit
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
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit", inversedBy="panierProduit",cascade={"persist"})
     */
    private $produits;
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Panier", inversedBy="panierProduit",cascade={"persist"})
     */
    private $paniers;
    
    /**
     * @var int
     *
     * @ORM\Column(name="quantiteProduit", type="integer", nullable=true)
     */
    private $quantiteProduit;
    
    /**
     * @var float
     *
     * @ORM\Column(name="poidProduit", type="float")
     */
    private $poidProduit;
    
    

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
     * @return PanierProduit
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
     * Set poidProduit
     *
     * @param float $poidProduit
     *
     * @return PanierProduit
     */
    public function setPoidProduit($poidProduit)
    {
        $this->poidProduit = $poidProduit;

        return $this;
    }

    /**
     * Get poidProduit
     *
     * @return float
     */
    public function getPoidProduit()
    {
        return $this->poidProduit;
    }

    /**
     * Set produits
     *
     * @param \AdminBundle\Entity\Produit $produits
     *
     * @return PanierProduit
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

    /**
     * Set paniers
     *
     * @param \AdminBundle\Entity\Panier $paniers
     *
     * @return PanierProduit
     */
    public function setPaniers(\AdminBundle\Entity\Panier $paniers = null)
    {
        $this->paniers = $paniers;

        return $this;
    }

    /**
     * Get paniers
     *
     * @return \AdminBundle\Entity\Panier
     */
    public function getPaniers()
    {
        return $this->paniers;
    }
}
