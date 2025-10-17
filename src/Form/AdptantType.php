<?php

namespace App\Form;

use App\Entity\Adptant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdptantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_adoptant')
            ->add('prenom_adoptant')
            ->add('adresse_adoptant')
            ->add('telephone_adoptant')
            ->add('genre_animal_souhaite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adptant::class,
        ]);
    }
}
