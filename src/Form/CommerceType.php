<?php

namespace App\Form;

use App\Entity\Societe;
use App\Entity\Personne;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommerceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("domaineActivite", TextType::class)
            ->add("commerce", ChoiceType::class,[
                'choices' => [
                    'COMMERCE' => 0,
                    'IMPORTATEUR/EXPORTATEUR' => 1,
                    'TRADER' => 2,
                    'REVENDEUR' => 3,
                    'PRESTA DE SERVICE' => 4
                ],
                'expanded' => true,
            ])
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}