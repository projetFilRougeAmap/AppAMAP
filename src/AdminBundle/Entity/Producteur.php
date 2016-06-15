<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producteur
 *
 * @ORM\Table(name="producteur")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProducteurRepository")

 */
class Producteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var String
     *
     * @ORM\Column(name="numero", type="string")
     */
    private $numero;
    
    /**
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Stock", mappedBy="producteur")
     */
    private $stocks;
    
    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\User")
     */
    private $user;

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
     * Set numero
     *
     * @param string $numero
     *
     * @return Producteur
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Add stock
     *
     * @param \AdminBundle\Entity\Stock $stock
     *
     * @return Producteur
     */
    public function addStock(\AdminBundle\Entity\Stock $stock)
    {
        $this->stocks[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \AdminBundle\Entity\Stock $stock
     */
    public function removeStock(\AdminBundle\Entity\Stock $stock)
    {
        $this->stocks->removeElement($stock);
    }

    /**
     * Get stocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStocks()
    {
        return $this->stocks;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AdminBundle\Entity\User $user
     *
     * @return Producteur
     */
    public function setUser(\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AdminBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function __toString() {
    	return $this->user->getNom().' - '.$this->user->getPrenom();
    }
    
    
}
