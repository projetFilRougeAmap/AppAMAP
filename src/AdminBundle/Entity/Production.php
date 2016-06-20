<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="production")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProductionRepository")
 */
class Production
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
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float")
     */
    private $poids;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepot", type="datetime")
     */
    private $dateDepot;
    
    
    /**
    * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit", inversedBy="stock")
    */
    private $produits;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Producteur", inversedBy="production")
     */
    private $producteur;
    
    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Entrepot", cascade={"persist"})
     */
    private $entrepot;

    public function __construct()
    {
    	$this->dateDepot = new \DateTime();
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
     * @return Production
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
     * Set poids
     *
     * @param float $poids
     *
     * @return Production
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }


    /**
     * Set produits
     *
     * @param \AdminBundle\Entity\Produit $produits
     *
     * @return Production
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
     * Set producteur
     *
     * @param \AdminBundle\Entity\Producteur $producteur
     *
     * @return Production
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

    /**
     * Set dateDepot
     *
     * @param \DateTime $dateDepot
     *
     * @return Production
     */
    public function setDateDepot($dateDepot)
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    /**
     * Get dateDepot
     *
     * @return \DateTime
     */
    public function getDateDepot()
    {
        return $this->dateDepot;
    }

    /**
     * Set entrepot
     *
     * @param \AdminBundle\Entity\Entrepot $entrepot
     *
     * @return Production
     */
    public function setEntrepot(\AdminBundle\Entity\Entrepot $entrepot = null)
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    /**
     * Get entrepot
     *
     * @return \AdminBundle\Entity\Entrepot
     */
    public function getEntrepot()
    {
        return $this->entrepot;
    }
}
