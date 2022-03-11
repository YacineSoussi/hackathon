<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ReinitializePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'constraints' => [new Length([
                'min' => 8,
                'minMessage' => "Votre mot de passe doit faire minimum 8 caractères"
                ])],
            'invalid_message' => 'Le mot de passe et la confirmation doivent être identique.',
            'label' => 'Mon nouveau mot de passe',
            'required' => true,
            'first_name' => 'password',
            'second_name' => 'confirm',
            'first_options' => [
                'label' => 'Mon nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nouveau mot de passe.'
                ]
            ],
            'second_options' => [
                'label' => 'Confirmez votre nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de confirmer votre nouveau mot de passe.'
                ]
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
