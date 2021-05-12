<?php

namespace App\Form;

use App\Entity\Pays;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nomPays", ChoiceType::class, [
                'choice_label' => function(Pays $pays){
                    dump($pays);die;
                },
            ])
            ->add('provaince', ChoiceType::class, [
                'disabled' => true
            ])
            ->add('quartier', ChoiceType::class,[
                'disabled' => true
            ])
            ->add('region', ChoiceType::class, [
                'disabled' => true
            ])
            ->add('capital', TextType::class, [
                'disabled' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}