<?php

namespace App\Form;

use App\Entity\Profession;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProfessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domaineActivite', TextType::class)
            ->add('salaire', MoneyType::class)
            ->add('prime', MoneyType::class)
            ->add('loyer', MoneyType::class)
            ->add('profession', TextType::class)
            ->add('proprietaire', ChoiceType::class, [
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
            ])
            ->add('personnel', NumberType::class)
            //->add('membre', EntityType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profession::class
        ]);
    }
}
