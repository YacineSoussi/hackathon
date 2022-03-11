<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Rapport;
use App\Form\FileUploadType;
use App\Entity\RapportMesure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ExcelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'area' => 'area',
                    'bar' => 'bar',
                    'doughnut' => 'doughnut',
                    'line' => 'line',
                    'polarArea' => 'polarArea',
                    'radar' => 'radar',
                    'scatter' => 'scatter',
                ]
            ])
            ->add('client', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'required' => true,
            ])
            ->add('rapportMesures', CollectionType::class, [
                'label' => false,
                'entry_type' => RapportMesure::class,
                'entry_options' => [
                    'label' => false
                ],
                'prototype' => true,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])
            ->add('rapportMesures', CollectionType::class, [
                'label' => 'Excel',
                'entry_type' => FileUploadType::class,
                'entry_options' => [
                    'label' => false
                ],
                'prototype' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rapport::class,
        ]);
    }
}
