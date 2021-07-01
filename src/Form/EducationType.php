<?php

namespace App\Form;

use App\Entity\Education;
use App\Entity\Pere;
use App\Entity\Mere;
use App\Entity\Enfant;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nomEcole", TextType::class)
            ->add("nomUniversite", TextType::class)
            ->add("classe", TextType::class)
            ->add("carteEtudiant", TextType::class)
            ->add("adresseEcole", TextType::class)
            ->add("adresseUniversite", TextType::class)
            ->add("diplome", TextType::class)
            ->add("anneeScolaire", DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("nomPays", CountryType::class)
            ->add("province", CountryType::class)
            ->add("region", CountryType::class)
            ->add("fokotany", CountryType::class)
            ->add("pere", EntityType::class, [
                'class' => Pere::class,
                'choice_label' => 'nomFamille',
            ])
            ->add("mere", EntityType::class, [
                'class' => Mere::class,
                'choice_label' => 'nomFamille',
            ])
            ->add("enfant", EntityType::class, [
                'class' => Enfant::class,
                'choice_label' => 'nomFamille',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}