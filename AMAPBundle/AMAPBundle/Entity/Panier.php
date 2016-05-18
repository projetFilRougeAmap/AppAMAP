<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\panierRepository")
 */
class Panier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDerniereModif", type="date", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateDerniereModif;


}

