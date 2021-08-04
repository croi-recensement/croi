<?php

namespace App\Form;

use App\Entity\Sante;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupeSanguin', ChoiceType::class, [
                'choices' => [
                    "O" => "O",
                    "A" => "A",
                    "B" => "B",
                    "AB" => "AB"
                ]
            ])
            ->add('etat', ChoiceType::class, [
                'choices' => [
                    "BON" => "bon",
                    "MOYEN" => "moyen",
                    "MAUVAIS" => "mauvais"
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('maladieChronique', ChoiceType::class, [
                "choices" => [
                    "OUI" => 'oui',
                    "NON" => 'non'
                ]
            ])
            ->add('temps', TextType::class)
            ->add('tailles', TextType::class)
            ->add('poids', TextType::class)
            ->add('operation', ChoiceType::class, [
                "choices" => [
                    "OUI" => "oui",
                    "NON" => "non"
                ]
            ])
            ->add('chosePorte', ChoiceType::class, [
                "choices" => [
                    "LUNETTE" => "LUNETTE",
                    "PROTHESES DENTS" => "PROTHESES DENTS",
                    "AUTRE PROTHESES" => [
                        "choices" => [
                            "OUI" => "OUI",
                            "NON" => "NON"
                        ]
                    ]
                ]
            ])
            ->add('intervention', TextType::class)
            ->add('prix', NumberType::class)
            ->add('traitement', ChoiceType::class,[
                "choices" => [
                    "OUI" => "oui",
                    "NON" => "non"
                ]
            ])
            ->add('typeMaladie', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    "choices" => [
                        "test" => "test"
                    ]
                ]
            ])
            ->add('frequentation', TextType::class)
            ->add('bilanSanguin', ChoiceType::class)
            ->add('paysChirurgie', TextType::class)
            ->add('note', NumberType::class)
            ->add('nomMedicament', TextType::class)
            ->add('frequence', TextType::class)
            ->add('maladieRelative', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sante::class,
        ]);
    }
}
