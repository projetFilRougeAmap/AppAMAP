<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProduitRepository")
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
     * @ORM\Column(name="libelle", type="string", length=255,unique=true)
     */
    private $libelle;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
    * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Stock", mappedBy="produits")
    */
    private $stock;
    
    /**
    * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\CategorieProduit", inversedBy="produits")
    */
    private $categorieProduit;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\PanierProduit", mappedBy="produits")
     */
    private $panierProduit;
    
    /**
    * @ORM\OneToMany(targetEntity="AdminBundle\Entity\CommandeProduit", mappedBy="produits")
    */
    private $commandeProduit;
    
    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\ContratProducteurProduit", mappedBy="produit")
     */
    private $contratProducteur;

   
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
     * @param \AdminBundle\Entity\Stock $stock
     *
     * @return Produit
     */
    public function addStock(\AdminBundle\Entity\Stock $stock)
    {
        $this->stock[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \AdminBundle\Entity\Stock $stock
     */
    public function removeStock(\AdminBundle\Entity\Stock $stock)
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
     * @param \AdminBundle\Entity\CategorieProduit $categorieProduit
     *
     * @return Produit
     */
    public function setCategorieProduit(\AdminBundle\Entity\CategorieProduit $categorieProduit = null)
    {
        $this->categorieProduit = $categorieProduit;

        return $this;
    }

    /**
     * Get categorieProduit
     *
     * @return \AdminBundle\Entity\CategorieProduit
     */
    public function getCategorieProduit()
    {
        return $this->categorieProduit;
    }

    /**
     * Add panier
     *
     * @param \AdminBundle\Entity\Panier $panier
     *
     * @return Produit
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
     * Add commandeProduit
     *
     * @param \AdminBundle\Entity\CommandeProduit $commandeProduit
     *
     * @return Produit
     */
    public function addCommandeProduit(\AdminBundle\Entity\CommandeProduit $commandeProduit)
    {
        $this->commandeProduit[] = $commandeProduit;

        return $this;
    }

    /**
     * Remove commandeProduit
     *
     * @param \AdminBundle\Entity\CommandeProduit $commandeProduit
     */
    public function removeCommandeProduit(\AdminBundle\Entity\CommandeProduit $commandeProduit)
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
    public function __toString() {
    	return $this->libelle;
    }

    /**
     * Set panierProduit
     *
     * @param \AdminBundle\Entity\Panier $panierProduit
     *
     * @return Produit
     */
    public function setPanierProduit(\AdminBundle\Entity\Panier $panierProduit = null)
    {
        $this->panierProduit = $panierProduit;

        return $this;
    }

    /**
     * Get panierProduit
     *
     * @return \AdminBundle\Entity\Panier
     */
    public function getPanierProduit()
    {
        return $this->panierProduit;
    }

    /**
     * Add panierProduit
     *
     * @param \AdminBundle\Entity\PanierProduit $panierProduit
     *
     * @return Produit
     */
    public function addPanierProduit(\AdminBundle\Entity\PanierProduit $panierProduit)
    {
        $this->panierProduit[] = $panierProduit;

        return $this;
    }

    /**
     * Remove panierProduit
     *
     * @param \AdminBundle\Entity\PanierProduit $panierProduit
     */
    public function removePanierProduit(\AdminBundle\Entity\PanierProduit $panierProduit)
    {
        $this->panierProduit->removeElement($panierProduit);
    }

    /**
     * Add contratProducteur
     *
     * @param \AdminBundle\Entity\ContratProducteurProduit $contratProducteur
     *
     * @return Produit
     */
    public function addContratProducteur(\AdminBundle\Entity\ContratProducteurProduit $contratProducteur)
    {
        $this->contratProducteur[] = $contratProducteur;

        return $this;
    }

    /**
     * Remove contratProducteur
     *
     * @param \AdminBundle\Entity\ContratProducteurProduit $contratProducteur
     */
    public function removeContratProducteur(\AdminBundle\Entity\ContratProducteurProduit $contratProducteur)
    {
        $this->contratProducteur->removeElement($contratProducteur);
    }

    /**
     * Get contratProducteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratProducteur()
    {
        return $this->contratProducteur;
    }
}
