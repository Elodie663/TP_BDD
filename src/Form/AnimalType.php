<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Cage;
use App\Entity\CarnetSante;
use App\Entity\Famille;
use App\Entity\Menu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_animal')
            ->add('race')
            ->add('sexe')
            ->add('date_naissance')
            ->add('date_arrivee')
            ->add('domestique_sauvage')
            ->add('adoptable')
            ->add('famille', EntityType::class, [
                'class' => Famille::class,
                'choice_label' => 'id',
            ])
            ->add('carnetDeSante', EntityType::class, [
                'class' => CarnetSante::class,
                'choice_label' => 'id',
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => 'id',
            ])
            ->add('cage', EntityType::class, [
                'class' => Cage::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
