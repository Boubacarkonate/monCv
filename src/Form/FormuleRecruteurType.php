<?php

namespace App\Form;

use App\Entity\FormuleRecruteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormuleRecruteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('forfait')
            ->add('nombre_annonce')
            ->add('nombre_cv')
            ->add('prix')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormuleRecruteur::class,
        ]);
    }
}
