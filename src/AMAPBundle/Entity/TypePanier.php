<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePanier
 *
 * @ORM\Table(name="type_panier")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\TypePanierRepository")
 */
class TypePanier
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
    * @ORM\OneToMany(targetEntity="AMAPBundle\Entity\Panier", mappedBy="typePanier")
    */
    private $paniers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add panier
     *
     * @param \AMAPBundle\Entity\Panier $panier
     *
     * @return TypePanier
     */
    public function addPanier(\AMAPBundle\Entity\Panier $panier)
    {
        $this->paniers[] = $panier;

        return $this;
    }

    /**
     * Remove panier
     *
     * @param \AMAPBundle\Entity\Panier $panier
     */
    public function removePanier(\AMAPBundle\Entity\Panier $panier)
    {
        $this->paniers->removeElement($panier);
    }

    /**
     * Get paniers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaniers()
    {
        return $this->paniers;
    }
}
