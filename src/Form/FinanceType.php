<?php

namespace App\Form;

use App\Entity\Finance;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FinanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("salaire", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("loyer", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("primeGratification", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Finance::class,
        ]);
    }
}