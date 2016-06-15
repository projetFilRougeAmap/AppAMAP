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
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit", inversedBy="panierProduit")
     */
    private $produits;
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Panier", inversedBy="panierProduit")
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
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return PanierProduit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Add produit
     *
     * @param \AdminBundle\Entity\Produit $produit
     *
     * @return PanierProduit
     */
    public function addProduit(\AdminBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AdminBundle\Entity\Produit $produit
     */
    public function removeProduit(\AdminBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Add panier
     *
     * @param \AdminBundle\Entity\Panier $panier
     *
     * @return PanierProduit
     */
    public function addPanier(\AdminBundle\Entity\Panier $panier)
    {
        $this->paniers[] = $panier;

        return $this;
    }

    /**
     * Remove panier
     *
     * @param \AdminBundle\Entity\Panier $panier
     */
    public function removePanier(\AdminBundle\Entity\Panier $panier)
    {
        $this->paniers->removeElement($panier);
    }

    /**
     * Get paniers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaniers()
    {
        return $this->paniers;
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
}
