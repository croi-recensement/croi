<?php

namespace App\Form;

use App\Entity\Logement;
use App\Entity\Pays;
use App\Form\PaysType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
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
            ->add("adresseEmail", TextType::class)
            ->add("proprietaireounon", ChoiceType::class,[
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => false,
            ])
            ->add("maisonalloueounon", ChoiceType::class,[
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'expanded' => false,
            ])
            ->add("montantLoyer", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("montantSyndic", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("nomPays", CountryType::class)
            ->add("province", CountryType::class)
            ->add("region", CountryType::class)
            ->add("fokotany", CountryType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logement::class,
        ]);
    }
}