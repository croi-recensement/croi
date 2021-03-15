<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom", TextType::class)
            ->add("prenom", TextType::class)
            ->add("dateNaissance", DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("lieuNaissance", TextType::class)
            ->add("nationalite", TextType::class)
            ->add("situationMarital", TextType::class)
            ->add("specialite", TextType::class)
            ->add("situationProfessionnel", TextType::class)
            ->add("groupSangin", TextType::class)
            ->add("paysOrigin", TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}