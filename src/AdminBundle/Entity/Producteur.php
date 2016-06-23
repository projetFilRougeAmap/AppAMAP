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
     * @ORM\OneToMany(targetEntity="AdminBundle\Entity\Production", mappedBy="producteur")
     */
    private $production;
    
    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\User")
     */
    private $user;
    
    /**
     * @ORM\ManyToMany(targetEntity="AdminBundle\Entity\ContratProducteur")
     */
    private $contrats;

   
    
    public function __toString() {
    	return $this->user->getNom().' - '.$this->user->getPrenom();
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->production = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add production
     *
     * @param \AdminBundle\Entity\Production $production
     *
     * @return Producteur
     */
    public function addProduction(\AdminBundle\Entity\Production $production)
    {
        $this->production[] = $production;

        return $this;
    }

    /**
     * Remove production
     *
     * @param \AdminBundle\Entity\Production $production
     */
    public function removeProduction(\AdminBundle\Entity\Production $production)
    {
        $this->production->removeElement($production);
    }

    /**
     * Get production
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduction()
    {
        return $this->production;
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

    /**
     * Add contrat
     *
     * @param \AdminBundle\Entity\ContratProducteur $contrat
     *
     * @return Producteur
     */
    public function addContrat(\AdminBundle\Entity\ContratProducteur $contrat)
    {
        $this->contrats[] = $contrat;

        return $this;
    }

    /**
     * Remove contrat
     *
     * @param \AdminBundle\Entity\ContratProducteur $contrat
     */
    public function removeContrat(\AdminBundle\Entity\ContratProducteur $contrat)
    {
        $this->contrats->removeElement($contrat);
    }

    /**
     * Get contrats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContrats()
    {
        return $this->contrats;
    }
}
