<?php

namespace App\Form;

use App\Entity\Enfants;
use App\Entity\Personne;
use App\Entity\Femme;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("parent", EntityType::class, [
                'class' => Femme::class,
                'choice_label' => function($parent){
                   return $parent->getCoinjoint()->getNom() . ' ' . $parent->getCoinjointe()->getNom();
                },
            ])
            ->add("enfant", EntityType::class,[
                'class' => Personne::class,
                'choice_label' => function($enfant){
                    return $enfant->getNom() . ' ' . $enfant->getPrenom();
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