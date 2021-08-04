<?php

namespace App\Form;

use App\Entity\Sport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pratiqueSport', ChoiceType::class, [
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
            ])
            ->add('quelSport', TextType::class)
            ->add('quelFrequence', TextType::class)
            ->add('pratiqueLoisir', ChoiceType::class, [
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
            ])
            ->add('quelLoisir', TextType::class)
            //->add('membre', EntityType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sport::class,
        ]);
    }
}
