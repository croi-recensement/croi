<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExcelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("data", ChoiceType::class, [
                'choices'  => [
                    'PERSONNE' => 'personne',
                    'SANTE' => 'sante',
                    'EDUCATION' => 'education',
                    'SOCIAL' => 'social',
                    'LOGEMENT' => 'logement',
                    'SPORT' => 'sport',
                    'FINANCE' => 'finance',
                    'COMMERCE' => 'commerce',
                    'TABLIGH' => 'tabligh',
                ],
                'multiple'      => true
            ])
            ->add('file', FileType::class)
            ->add('importer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //'data_class' => Logement::class,
        ]);
    }
}