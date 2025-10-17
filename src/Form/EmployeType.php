<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\VilleResidence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_employe')
            ->add('prenom_employe')
            ->add('age')
            ->add('sexe')
            ->add('poste')
            ->add('VilleResidence', EntityType::class, [
                'class' => VilleResidence::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
