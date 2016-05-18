<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit
 *
 * @ORM\Table(name="entrepot")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\EntrepotRepository")
 */
class Entrepot
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
    * @ORM\OneToMany(targetEntity="AMAPBundle\Entity\Stock", mappedBy="entrepot")
    */
    private $stock;
    
    /**
    * @ORM\OneToOne(targetEntity="AMAPBundle\Entity\Adresse")
    */
    private $adresse;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stock = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Entrepot
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
     * Add stock
     *
     * @param \AMAPBundle\Entity\Stock $stock
     *
     * @return Entrepot
     */
    public function addStock(\AMAPBundle\Entity\Stock $stock)
    {
        $this->stock[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \AMAPBundle\Entity\Stock $stock
     */
    public function removeStock(\AMAPBundle\Entity\Stock $stock)
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
     * Set adresse
     *
     * @param \AMAPBundle\Entity\Adresse $adresse
     *
     * @return Entrepot
     */
    public function setAdresse(\AMAPBundle\Entity\Adresse $adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \AMAPBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}
