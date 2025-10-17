<?php

namespace App\Form;

use App\Entity\CarnetSante;
use App\Entity\Vaccin;
use App\Entity\Vaccination;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VaccinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_vaccination')
            ->add('date_prochaine_vaccination')
            ->add('carnetDeSante', EntityType::class, [
                'class' => CarnetSante::class,
                'choice_label' => 'id',
            ])
            ->add('vaccin', EntityType::class, [
                'class' => Vaccin::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vaccination::class,
        ]);
    }
}
