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
     * @ORM\Column(name="document", type="string", length=255, nullable=true)
     */
    private $document;


    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\ContratProducteurProduit", mappedBy="contratProducteur",cascade={"persist"})
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
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Producteur", inversedBy="contrats",cascade={"persist"})
     */
    private $producteur;


    public function __toString()
    {
    	return (string) $this->getLibelle();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateFin = new \DateTime();
        $this->dateDebut = new \DateTime();
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
     * @return ContratProducteur
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
     * @return ContratProducteur
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return ContratProducteur
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
     * @return ContratProducteur
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
     * Add produit
     *
     * @param \AdminBundle\Entity\ContratProducteurProduit $produit
     *
     * @return ContratProducteur
     */
    public function addProduit(\AdminBundle\Entity\ContratProducteurProduit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AdminBundle\Entity\ContratProducteurProduit $produit
     */
    public function removeProduit(\AdminBundle\Entity\ContratProducteurProduit $produit)
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
     * Set producteur
     *
     * @param \AdminBundle\Entity\Producteur $producteur
     *
     * @return ContratProducteur
     */
    public function setProducteur(\AdminBundle\Entity\Producteur $producteur = null)
    {
        $this->producteur = $producteur;

        return $this;
    }

    /**
     * Get producteur
     *
     * @return \AdminBundle\Entity\Producteur
     */
    public function getProducteur()
    {
        return $this->producteur;
    }
}
