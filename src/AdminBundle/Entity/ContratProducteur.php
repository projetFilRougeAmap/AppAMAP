<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratClient
 *
 * @ORM\Table(name="contrat_producteur")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ContratClientRepository")
 */
class ContratProducteur
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
     * @var string
     *
     * @ORM\Column(name="document", type="string", length=255)
     */
    private $document;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPanier", type="integer")
     */
    private $nbPanier;

    /**
    * @ORM\ManyToMany(targetEntity="AdminBundle\Entity\Produit")
    */
    private $produits;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="modePaiement", type="string", length=255, nullable=true)
     */
    private $modePaiement;


    /**
     * Get id
     *
     * @return int
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
     * @return ContratClient
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
     * Set document
     *
     * @param string $document
     *
     * @return ContratClient
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set nbPanier
     *
     * @param integer $nbPanier
     *
     * @return ContratClient
     */
    public function setNbPanier($nbPanier)
    {
        $this->nbPanier = $nbPanier;

        return $this;
    }

    /**
     * Get nbPanier
     *
     * @return int
     */
    public function getNbPanier()
    {
        return $this->nbPanier;
    }

    /**
     * Set paniers
     *
     * @param string $paniers
     *
     * @return ContratClient
     */
    public function setPaniers($paniers)
    {
        $this->paniers = $paniers;

        return $this;
    }

    /**
     * Get paniers
     *
     * @return string
     */
    public function getPaniers()
    {
        return $this->paniers;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return ContratClient
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return ContratClient
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return ContratClient
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \AdminBundle\Entity\Produit $produit
     *
     * @return ContratProducteur
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
}
