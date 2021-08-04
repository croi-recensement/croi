<?php

namespace App\Form;

use App\Entity\Commity;
use App\Form\SanteType;
use App\Form\EducationType;
use App\Form\LogementType;
use App\Form\SportType;
use App\Form\TablighType;
use App\Form\SocialType;
use App\Form\ProfessionType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CommityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomFamille', TextType::class)
            ->add('prenomFamille', TextType::class)
            ->add('sexe', ChoiceType::class, [
                "choices" => [
                    "MASCULIN" => "masculin",
                    "FEMININ" => "feminin"
                ]
            ])
            ->add('dateNaissance', DateType::class)
            ->add('lieuNaissance', TextType::class)
            ->add('nationalite', TextType::class)
            ->add('documentVoyage', ChoiceType::class, [
                "choices" => [
                    "Passeport officier" => "passeportOfficier",
                    "Passeport diplômatique" => "passeportDiplomatique"
                ]
            ])
            ->add('numeroPassport', TextType::class)
            ->add('numeroCin', TextType::class)
            ->add('situationMarital', TextType::class)
            ->add('numeroPhone', TextType::class)
            ->add('adresseEmail', TextType::class)
            ->add('situationFamiliale', ChoiceType::class, [
                "choices" => [
                    "PERE" => "pere",
                    "MERE" => "mere",
                    "ENFANT" => "enfant",
                ]
            ])
            ->add('photo', TextType::class)
            ->add('sante', SanteType::class)
            ->add('education', CollectionType::class,[
                'entry_type' => EducationType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('social' , CollectionType::class,[
                'entry_type' =>  SocialType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('logement', CollectionType::class,[
                'entry_type' =>  LogementType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('profession', CollectionType::class, [
                'entry_type' =>   ProfessionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('sport', SportType::class)
            ->add('tabligh', TablighType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commity::class,
        ]);
    }
}
