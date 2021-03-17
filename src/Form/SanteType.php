<?php

namespace App\Form;

use App\Entity\Maladie;
use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom",TextType::class)
            ->add("evacuation", ChoiceType::class,[
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => true,
            ])
            ->add("chirurgie", ChoiceType::class, [
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => true,
            ])
            ->add('annee', TextType::class)
            ->add("nomChirurgie",TextType::class)
            ->add("coutDiagnostique", MoneyType:: class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("coutEvacuation", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("dateChirurgie", DateType::class,[
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("dateEvacuation", DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("type", ChoiceType::class,[
                'choices' => [
                    'CHRONIQUE' => 1,
                    'PONCTUELLE' => 0
                ],
            ])
            ->add("Personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maladie::class,
        ]);
    }
}
