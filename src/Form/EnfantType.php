<?php

namespace App\Form;

use App\Entity\Enfant;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nomFamille", TextType::class)
            ->add("prenomFamille", TextType::class)
            ->add("lieuNaissance", TextType::class)
            ->add("dateNaissance", DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("lieuNaissance", TextType::class)
            ->add("sexe", ChoiceType::class,[
                'choices' => [
                    'Homme' => "masculin",
                    'Femme' => "feminin"
                ],
                'expanded' => false,

            ])
            ->add("nationalite", CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
            ])
            ->add("situationMarital", ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'Célibataire' => "celibat",
                    'Marié' => "marie",
                    'Divorcé' => "divorce",
                    'Veuve' => "veuve",
                    'Veuf' => "veuf"
                ],
            
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class,
        ]);
    }
}
