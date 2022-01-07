<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    "max" => 30
                ]),
                'label' => 'Votre Prénom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    "max" => 30
                ]),
                'label' => 'Votre Nom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    "max" => 30
                ]),
                'label' => 'Votre Email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre adresse Email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique.',
                'label' => 'Votre Mot de passe',
                'required' =>true,
                'first_options' => [ 'label' => 'Mot de passe '],
                'attr' => [
                    'placeholder' => 'Merci de saisir votre mot de passe'
                ],
                'second_options' => [ 
                        'label' => 'Confirmez votre Mot de passe',
                        'attr' => [
                            'placeholder' => 'Merci de confirmer votre Mot de passe'
                        ]
                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
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
