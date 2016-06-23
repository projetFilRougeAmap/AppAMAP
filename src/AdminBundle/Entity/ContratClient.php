<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratClient
 *
 * @ORM\Table(name="contrat_client")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ContratClientRepository")
 */
class ContratClient
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
    * @ORM\ManyToMany(targetEntity="AdminBundle\Entity\Panier",cascade={"persist"})
    */
    private $paniers;

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
     * @var int
     *
     * @ORM\Column(name="nbPanierPrevu", type="integer")
     */
    private $nbPanierPrevu;
    
    /**
     * @var int
     *
     * @ORM\Column(name="nbPanier", type="integer")
     */
    private $nbPanier;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\User", inversedBy="contrats",cascade={"persist"})
     */
    private $utilisateur;


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
        $this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateFin = new \DateTime();
        $this->dateDebut = new \DateTime();
    }

    /**
     * Add panier
     *
     * @param \AdminBundle\Entity\Panier $panier
     *
     * @return ContratClient
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
     * Set nbPanierPrevu
     *
     * @param integer $nbPanierPrevu
     *
     * @return Panier
     */
    public function setNbPanierPrevu($nbPanierPrevu)
    {
    	$this->nbPanierPrevu = $nbPanierPrevu;
    
    	return $this;
    }
    
    /**
     * Get nbPanierPrevu
     *
     * @return integer
     */
    public function getNbPanierPrevu()
    {
    	return $this->nbPanierPrevu;
    }
    
    /**
     * Set nbPanier
     *
     * @param integer $nbPanier
     *
     * @return Panier
     */
    public function setNbPanier($nbPanier)
    {
    	$this->nbPanier = $nbPanier;
    
    	return $this;
    }
    
    /**
     * Get nbPanier
     *
     * @return integer
     */
    public function getNbPanier()
    {
    	return $this->nbPanier;
    }

    /**
     * Set utilisateur
     *
     * @param \AdminBundle\Entity\User $utilisateur
     *
     * @return ContratClient
     */
    public function setUtilisateur(\AdminBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AdminBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
