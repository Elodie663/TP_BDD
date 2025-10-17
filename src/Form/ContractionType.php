<?php

namespace App\Form;

use App\Entity\CarnetSante;
use App\Entity\Contraction;
use App\Entity\Maladie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateContraction')
            ->add('carnetSante', EntityType::class, [
                'class' => CarnetSante::class,
                'choice_label' => 'id',
            ])
            ->add('maladie', EntityType::class, [
                'class' => Maladie::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contraction::class,
        ]);
    }
}
