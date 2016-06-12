<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producteur
 *
 * @ORM\Table(name="producteur")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProducteurRepository")
 * @ORM\AttributeOverrides({
 * 		@ORM\AttributeOverride(name="password", column=@ORM\Column(type="string", name="password", length=255, unique=false, nullable=true)),
 * 		@ORM\AttributeOverride(name="username", column=@ORM\Column(type="string", name="username", length=255, unique=false, nullable=true)),
 * 		@ORM\AttributeOverride(name="usernameCanonical", column=@ORM\Column(type="string", name="username_canonical", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="email", column=@ORM\Column(type="string", name="email", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(type="string", name="email_canonical", length=255, unique=false, nullable=true))
 * })
 */
class Producteur extends User
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
}
