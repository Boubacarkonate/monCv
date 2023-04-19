<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('name')
            ->add('firstName')
            ->add('company')
            ->add('phone')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Recruteur' => 'ROLE_USER_RECRUTEUR',
                    'Candidat' => 'ROLE_USER'
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôle'

            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
