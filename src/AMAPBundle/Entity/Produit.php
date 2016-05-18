<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
    * @ORM\OneToMany(targetEntity="AMAPBundle\Entity\Stock", mappedBy="produits")
    */
    private $stock;
    
    /**
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\CategorieProduit", inversedBy="produits")
    */
    private $categorieProduit;
    
    /**
    * @ORM\ManyToMany(targetEntity="AMAPBundle\Entity\Panier", mappedBy="produits")
    */
    private $paniers;
    
    /**
    * @ORM\OneToMany(targetEntity="AMAPBundle\Entity\CommandeProduit", mappedBy="produits")
    */
    private $commandeProduit;

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stock = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commandeProduit = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Produit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Add stock
     *
     * @param \AMAPBundle\Entity\Stock $stock
     *
     * @return Produit
     */
    public function addStock(\AMAPBundle\Entity\Stock $stock)
    {
        $this->stock[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \AMAPBundle\Entity\Stock $stock
     */
    public function removeStock(\AMAPBundle\Entity\Stock $stock)
    {
        $this->stock->removeElement($stock);
    }

    /**
     * Get stock
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set categorieProduit
     *
     * @param \AMAPBundle\Entity\CategorieProduit $categorieProduit
     *
     * @return Produit
     */
    public function setCategorieProduit(\AMAPBundle\Entity\CategorieProduit $categorieProduit = null)
    {
        $this->categorieProduit = $categorieProduit;

        return $this;
    }

    /**
     * Get categorieProduit
     *
     * @return \AMAPBundle\Entity\CategorieProduit
     */
    public function getCategorieProduit()
    {
        return $this->categorieProduit;
    }

    /**
     * Add panier
     *
     * @param \AMAPBundle\Entity\Panier $panier
     *
     * @return Produit
     */
    public function addPanier(\AMAPBundle\Entity\Panier $panier)
    {
        $this->paniers[] = $panier;

        return $this;
    }

    /**
     * Remove panier
     *
     * @param \AMAPBundle\Entity\Panier $panier
     */
    public function removePanier(\AMAPBundle\Entity\Panier $panier)
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
     * Add commandeProduit
     *
     * @param \AMAPBundle\Entity\CommandeProduit $commandeProduit
     *
     * @return Produit
     */
    public function addCommandeProduit(\AMAPBundle\Entity\CommandeProduit $commandeProduit)
    {
        $this->commandeProduit[] = $commandeProduit;

        return $this;
    }

    /**
     * Remove commandeProduit
     *
     * @param \AMAPBundle\Entity\CommandeProduit $commandeProduit
     */
    public function removeCommandeProduit(\AMAPBundle\Entity\CommandeProduit $commandeProduit)
    {
        $this->commandeProduit->removeElement($commandeProduit);
    }

    /**
     * Get commandeProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandeProduit()
    {
        return $this->commandeProduit;
    }
}
