<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Recruteur' => 'ROLE_USER_RECRUTEUR',
                    'Candidat' => 'ROLE_USER'
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôle'

            ])
            ->add('password')
            // ->add('second_options' => ['label' => 'Repeat Password'])  repeat type à voir surla doc pour confirmer le mtp
            ->add('name')
            ->add('firstName')
            ->add('company')
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
