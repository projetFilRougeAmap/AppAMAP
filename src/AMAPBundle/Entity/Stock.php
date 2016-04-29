<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\StockRepository")
 */
class Stock
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
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Entrepot", inversedBy="stock")
    */
    private $entrepot;
    
    /**
    * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Produit", inversedBy="stock")
    */
    private $produits;
    

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
     * @return Stock
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
     * @return Stock
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
     * Set entrepot
     *
     * @param \AMAPBundle\Entity\Entrepot $entrepot
     *
     * @return Stock
     */
    public function setEntrepot(\AMAPBundle\Entity\Entrepot $entrepot = null)
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    /**
     * Get entrepot
     *
     * @return \AMAPBundle\Entity\Entrepot
     */
    public function getEntrepot()
    {
        return $this->entrepot;
    }

    /**
     * Set produits
     *
     * @param \AMAPBundle\Entity\Produit $produits
     *
     * @return Stock
     */
    public function setProduits(\AMAPBundle\Entity\Produit $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \AMAPBundle\Entity\Produit
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
