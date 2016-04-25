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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $poids;

    /**
     * @var \AMAPBundle\Entity\Entrepot
     *
     * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Entrepot", inversedBy="stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entrepot_id", referencedColumnName="id")
     * })
     */
    private $entrepot;

    /**
     * @var \AMAPBundle\Entity\Produit
     *
     * @ORM\ManyToOne(targetEntity="AMAPBundle\Entity\Produit", inversedBy="stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     * })
     */
    private $produit;


}

