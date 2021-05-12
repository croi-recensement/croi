<?php

namespace App\Form;

use App\Entity\Logement;
use App\Entity\Pays;
use App\Form\PaysType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("adressePermanente", TextType::class)
            ->add("adresseTemporaire", TextType::class)
            ->add("proprietaire", ChoiceType::class,[
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => true,
            ])
            ->add("maisonAllouer", ChoiceType::class, [
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => true,
            ])
            ->add("email", TextType::class)
            ->add("pays", TextType::class)
            ->add("province", TextType::class)
            ->add("region", TextType::class)
            ->add("quartier", TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logement::class,
        ]);
    }
}