<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\PanierRepository")
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
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
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\PanierProduit", mappedBy="paniers",cascade={"persist"})
     */
    private $panierProduit;
    
    /**
    * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\TypePanier", inversedBy="paniers",cascade={"persist"})
    */
    private $typePanier;
    
    /**
    * @ORM\ManyToMany(targetEntity="AdminBundle\Entity\Commande", inversedBy="paniers",cascade={"persist"})
    */
    private $commandes;
    
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panierProduit = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypePanier
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
     * Add panierProduit
     *
     * @param \AdminBundle\Entity\PanierProduit $panierProduit
     *
     * @return Panier
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
     * Get panierProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPanierProduit()
    {
        return $this->panierProduit;
    }

    /**
     * Set typePanier
     *
     * @param \AdminBundle\Entity\TypePanier $typePanier
     *
     * @return Panier
     */
    public function setTypePanier(\AdminBundle\Entity\TypePanier $typePanier = null)
    {
        $this->typePanier = $typePanier;

        return $this;
    }

    /**
     * Get typePanier
     *
     * @return \AdminBundle\Entity\TypePanier
     */
    public function getTypePanier()
    {
        return $this->typePanier;
    }

    /**
     * Add commande
     *
     * @param \AdminBundle\Entity\Commande $commande
     *
     * @return Panier
     */
    public function addCommande(\AdminBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \AdminBundle\Entity\Commande $commande
     */
    public function removeCommande(\AdminBundle\Entity\Commande $commande)
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
    
    public function __toString(){
    	return $this->libelle;
    }
}
