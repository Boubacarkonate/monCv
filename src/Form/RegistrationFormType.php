<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => "Email*",
                'required' => true,
            ])
            ->add('name', TextType::class, [
                'label' => "Nom*",
                'required' => true,
            ])
            ->add('first_name', TextType::class, [
                'label' => "Prénom*",
                'required' => true,
            ])
            ->add('company', TextType::class, [
                'label' => "Nom de l'entreprise",
            ])
            ->add('phone', NumberType::class, [
                'label' => "Numéro de téléphone",
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => "Acceptez les conditions",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les termes.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => "Mot de passe*",
                'required' => true,
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new Regex('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', 
                    "Il faut un mot de passe de 14 caractères avec au moins 1 majuscule, 1 miniscule, 1 caractère spécial")     //faire apparaître le message
                ],
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
