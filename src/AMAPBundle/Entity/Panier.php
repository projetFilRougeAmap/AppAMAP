<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\PanierRepository")
 */
class Panier
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDerniereModif", type="date", nullable=true)
     */
    private $dateDerniereModif;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
    * @ORM\ManyToMany(targetEntity="AMAPBundle\Entity\Produit", inversedBy="paniers")
    */
    private $produits;
    
    /**
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\TypePanier", inversedBy="paniers")
    */
    private $typePanier;
    
    /**
    * @ORM\ManyToMany(targetEntity="AMAPBundle\Entity\Commande", inversedBy="paniers")
    */
    private $commandes;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dateDerniereModif
     *
     * @param \DateTime $dateDerniereModif
     *
     * @return Panier
     */
    public function setDateDerniereModif($dateDerniereModif)
    {
        $this->dateDerniereModif = $dateDerniereModif;

        return $this;
    }

    /**
     * Get dateDerniereModif
     *
     * @return \DateTime
     */
    public function getDateDerniereModif()
    {
        return $this->dateDerniereModif;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Panier
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
     * Add produit
     *
     * @param \AMAPBundle\Entity\Produit $produit
     *
     * @return Panier
     */
    public function addProduit(\AMAPBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AMAPBundle\Entity\Produit $produit
     */
    public function removeProduit(\AMAPBundle\Entity\Produit $produit)
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
     * Set typePanier
     *
     * @param \AMAPBundle\Entity\TypePanier $typePanier
     *
     * @return Panier
     */
    public function setTypePanier(\AMAPBundle\Entity\TypePanier $typePanier = null)
    {
        $this->typePanier = $typePanier;

        return $this;
    }

    /**
     * Get typePanier
     *
     * @return \AMAPBundle\Entity\TypePanier
     */
    public function getTypePanier()
    {
        return $this->typePanier;
    }

    /**
     * Add commande
     *
     * @param \AMAPBundle\Entity\Commande $commande
     *
     * @return Panier
     */
    public function addCommande(\AMAPBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \AMAPBundle\Entity\Commande $commande
     */
    public function removeCommande(\AMAPBundle\Entity\Commande $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
