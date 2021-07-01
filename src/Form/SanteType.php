<?php

namespace App\Form;

use App\Entity\Sante;
use App\Entity\Personne;
use App\Form\MembreType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("typeMaladie",CollectionType::class)
            ->add("categorie", CollectionType::class)
            ->add("maladie", CollectionType::class)
            ->add('groupeSanguin', CollectionType::class)
            ->add("evacuerounon", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => false,

            ])
            ->add("chirurgieounon", ChoiceType::class,[
                'choices' => [
                    'Oui' => "oui",
                    'Non' => "non"
                ],
                'expanded' => false,

            ])
            ->add("coutEvacuation", MoneyType::class, [
                'divisor' => 100,
                'currency' => false
            ])
            ->add("poids", TextType::class)
            ->add("taille", TextType::class)
            ->add("nomChirurgie", TextType::class)
            ->add("coutChirurgie", MoneyType::class, [
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
            'data_class' => Sante::class,
        ]);
    }
}
