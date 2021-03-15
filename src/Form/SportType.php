<?php

namespace App\Form;

use App\Entity\Sport;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom", TextType::class)
            ->add("frequence", TextType::class)
            ->add("lecture", ChoiceType::class, [
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => true,
            ])
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sport::class,
        ]);
    }
}
