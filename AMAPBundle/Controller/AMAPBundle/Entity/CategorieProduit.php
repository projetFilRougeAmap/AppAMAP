<?php

namespace AMAPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieProduit
 *
 * @ORM\Table(name="categorieProduit")
 * @ORM\Entity(repositoryClass="AMAPBundle\Repository\categorieProduitRepository")
 */
class CategorieProduit
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


}

