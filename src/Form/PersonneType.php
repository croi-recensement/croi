<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Pays;
use App\Form\LogementType;
//use App\Form\FinanceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom", TextType::class)
            ->add("prenom", TextType::class)
            ->add("lieuNaissance", TextType::class)
            ->add("dateNaissance", DateType::class, [
                'widget' => 'single_text',
                'required' => false
            ])
            ->add("nationalite", TextType::class)
            ->add("situationMarital", ChoiceType::class, [
                'choices' => [
                    'Célibataire' => "celibat",
                    'Marié' => "marie",
                    'Divorcé' => "divorce",
                    'Veuve' => "veuve",
                    'Veuf' => "veuf"
                ],
            
            ])
            ->add("sexe", ChoiceType::class,[
                'choices' => [
                    'Homme' => "masculin",
                    'Femme' => "feminin"
                ],
                'expanded' => true,

            ])
            ->add("cin", TextType::class)
            ->add("AutreNationalite", TextType::class)
            ->add("phone", TelType::class, [
                'invalid_message' => 'Numéro invalid !!!'
            ])
            ->add("passport", TextType::class)
            ->add("numeroPassport", TextType::class)
            ->add("numeroCin", TextType::class)
            ->add("nbrEnfant", TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
