<?php

namespace App\Form;

use App\Entity\RapportMesure;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportMesuresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('x', TextType::class,[
                'attr' => [
                    'label' => 'abscisse',
                    'placeholder' => 'Veuillez entrer votre abscisse'
                ]
            ])
            ->add('y', TextType::class,[
                'attr' => [
                    'label' => 'ordonnée',
                    'placeholder' => 'Veuillez entrer votre ordonnée'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RapportMesure::class,
        ]);
    }
}
