<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PanierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//             ->add('dateDerniereModif', \Symfony\Component\Form\Extension\Core\Type\DateType::class, array('format' => 'dd-MM-yyyy'))
            ->add('prix')
            ->add('libelle')
            ->add('panierProduit', CollectionType::class, array('entry_type' => PanierProduitType::class,
            		'allow_add' => true,
            		'prototype' => true,
            		'by_reference' => false,
            ))
            ->add('typePanier')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Panier'
        ));
    }
}
