<?php

namespace App\Form;

use App\Entity\Tabligh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TablighType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questionMadressa', ChoiceType::class, [
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
            ])
            ->add('classe', NumberType::class)
            ->add('frequentMadressa', ChoiceType::class, [
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
            ])
            ->add('frequentationMosque', ChoiceType::class, [
                'choices' => [
                    'prière du matin' => 'prière du matin',
                    'prière du midi' => 'prière du midi',
                    'prière du soir' => 'prière du soir',
                    'prière du vendredi' => 'prière du vendredi',
                    'jeudi soir' => 'jeudi soir',
                    'nuit de fêtes' => 'nuit de fêtes',
                    'nuits de deuil' => 'nuits de deuil',
                    'autres' => 'autres'
                ],
                'expanded' => false,
                'multiple' => true
            ])
            ->add('questionMosque', TextType::class)
            ->add('idee', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tabligh::class,
        ]);
    }
}
