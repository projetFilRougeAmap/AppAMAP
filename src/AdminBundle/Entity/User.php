<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Model\User as BaseUser;


/**
 * panier
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\UserRepository")
 * @ORM\AttributeOverrides({
 * 		@ORM\AttributeOverride(name="password", column=@ORM\Column(type="string", name="password", length=255, unique=false, nullable=true)),
 * 		@ORM\AttributeOverride(name="username", column=@ORM\Column(type="string", name="username", length=255, unique=false, nullable=true)),
 * 		@ORM\AttributeOverride(name="usernameCanonical", column=@ORM\Column(type="string", name="username_canonical", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="email", column=@ORM\Column(type="string", name="email", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(type="string", name="email_canonical", length=255, unique=false, nullable=true))
 * })
 */
class User extends BaseUser
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;
    
    /**
     * @ORM\ManyToMany(targetEntity="AdminBundle\Entity\ContratClient")
     */
    private $contrats;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __toString(){
    	return $this->libelle;
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }


    /**
     * Add contrat
     *
     * @param \AdminBundle\Entity\ContratClient $contrat
     *
     * @return User
     */
    public function addContrat(\AdminBundle\Entity\ContratClient $contrat)
    {
        $this->contrats[] = $contrat;

        return $this;
    }

    /**
     * Remove contrat
     *
     * @param \AdminBundle\Entity\ContratClient $contrat
     */
    public function removeContrat(\AdminBundle\Entity\ContratClient $contrat)
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
