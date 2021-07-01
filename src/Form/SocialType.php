<?php

namespace App\Form;

use App\Entity\Social;
use App\Entity\Membre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("aideNouriture", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => true,

            ])
            ->add("aideEducation", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => true,

            ])
            ->add("aideSante", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => true,

            ])
            ->add("aideTravail", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => true,

            ])
            ->add("membre", EntityType::class, [
                'class' => Membre::class,
                'choice_label' => function($value) {
                    if($value->getPereFamille() !== null && $value->getPereFamille() !== ""){
                        return $value->getPereFamille()->getNomFamille();
                    }
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Social::class,
        ]);
    }
}