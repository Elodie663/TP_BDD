<?php

namespace App\Form;

use App\Entity\Allee;
use App\Entity\Cage;
use App\Entity\Fonctionnalite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_cage')
            ->add('fonctionnalite', EntityType::class, [
                'class' => Fonctionnalite::class,
                'choice_label' => 'id',
            ])
            ->add('allee', EntityType::class, [
                'class' => Allee::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cage::class,
        ]);
    }
}
