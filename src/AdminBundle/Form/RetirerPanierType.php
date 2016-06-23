<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AdminBundle\Entity\Panier;
use AdminBundle\Entity\Entrepot;
use AdminBundle\Repository\PanierRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RetirerPanierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('panier',EntityType::class, 
            		array(
            				'class' => 'AdminBundle:Panier',
            		)
            )
            
            ->add('entrepot',EntityType::class, 
            		array(
            				'class' => 'AdminBundle:Entrepot',
            		)
            )
        ;
    }
    
    
}
