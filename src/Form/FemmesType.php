<?php

namespace App\Form;

use App\Entity\Femme;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FemmesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("coinjoint", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => function($personne){
                   return $personne->getNom() . ' ' . $personne->getPrenom() . ' ("'.$personne->getSituationMarital().'")';
                },
            ])
            ->add("coinjointe", EntityType::class,[
                'class' => Personne::class,
                'choice_label' => function($personne){
                    return $personne->getNom() . ' ' . $personne->getPrenom() . ' ("'.$personne->getSituationMarital().'")';
                 },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Femme::class,
        ]);
    }
}