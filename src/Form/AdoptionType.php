<?php

namespace App\Form;

use App\Entity\Adoption;
use App\Entity\Adptant;
use App\Entity\Animal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdoptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_adoption')
            ->add('prix_adoption')
            ->add('statut')
            // ->add('adoptant', EntityType::class, [
            //     'class' => Adptant::class,
            //     'choice_label' => 'id',
            // ])
            ->add('adoptant', EntityType::class, [
             'class' => Adptant::class,
             'choice_label' => function(Adptant $adoptant) {
                 return $adoptant->getNomAdoptant() . ' ' . $adoptant->getPrenomAdoptant();
                 },
                'label' => 'Adoptant',
                'placeholder' => 'Choisir un adoptant',
                ])

            // ->add('animal', EntityType::class, [
            //     'class' => Animal::class,
            //     'choice_label' => 'id',
            // ])


            ->add('animal', EntityType::class, [
            'class' => Animal::class,
            'choice_label' => 'nomAnimal',
            'label' => 'Animal',
            'placeholder' => 'Choisir un animal',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adoption::class,
        ]);
    }
}
