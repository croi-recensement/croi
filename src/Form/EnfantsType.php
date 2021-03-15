<?php

namespace App\Form;

use App\Entity\Enfants;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("pere", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => function($personne){
                   return $personne->getNom() . ' ' . $personne->getPrenom() . ' ("'.$personne->getSituationMarital().'")';
                },
            ])
            ->add("mere", EntityType::class,[
                'class' => Personne::class,
                'choice_label' => function($personne){
                    return $personne->getNom() . ' ' . $personne->getPrenom() . ' ("'.$personne->getSituationMarital().'")';
                 },
            ])
            ->add("enfant", EntityType::class,[
                'class' => Personne::class,
                'choice_label' => function($personne){
                    return $personne->getNom() . ' ' . $personne->getPrenom() . ' ("'.$personne->getSituationMarital().'")';
                 },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfants::class,
        ]);
    }
}