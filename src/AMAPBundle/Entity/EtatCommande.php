<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatCommande
 *
 * @ORM\Table(name="etat_commande")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\EtatCommandeRepository")
 */
class EtatCommande
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateMAJEtatCommande", type="date")
     */
    private $dateMAJEtatCommande;


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
     * Set dateMAJEtatCommande
     *
     * @param \DateTime $dateMAJEtatCommande
     *
     * @return EtatCommande
     */
    public function setDateMAJEtatCommande($dateMAJEtatCommande)
    {
        $this->dateMAJEtatCommande = $dateMAJEtatCommande;

        return $this;
    }

    /**
     * Get dateMAJEtatCommande
     *
     * @return \DateTime
     */
    public function getDateMAJEtatCommande()
    {
        return $this->dateMAJEtatCommande;
    }
}
