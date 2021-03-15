<?php

namespace App\Form;

use App\Entity\Education;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("ecole", TextType::class)
            ->add("classe", TextType::class)
            ->add("niveau", TextType::class)
            ->add("diplome", TextType::class)
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}