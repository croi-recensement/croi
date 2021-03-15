<?php

namespace App\Form;

use App\Entity\Social;
use App\Entity\Personne;
use App\Entity\Finance;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("conditionRsa", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("rsaJeuneActif", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("primeActivite", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("garantieJeunes", TextType::class)
            ->add("primeTransitoireSolidarite", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("aideFinancierePaiementFactureEau", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("prestationFamiliales", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("boursePrimaireLycee", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("garantieVisale", TextType::class)
            ->add("aidePaiementTelephoneInternet", MoneyType::class, [
                'divisor' => 10,
                'currency' => false
            ])
            ->add("allocationSolidaritePersonneAgee", TextType::class)
            ->add("protectionMaladieEtMedicament", TextType::class)
            ->add("complementaireSante", TextType::class)
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ])
            ->add("finance", EntityType::class, [
                'class' => Finance::class,
                'choice_label' => 'salaire',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Social::class,
        ]);
    }
}