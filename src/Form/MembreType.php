<?php

namespace App\Form;

use App\Entity\Membre;
use App\Entity\Personne;
//use App\Repository\Personne;
use App\Repository\PersonneRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\YEAR;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $personne = PersonneRepository::class;
        $builder
            ->add("personne", EntityType::class, [
                'class' => Personne::class,
                'query_builder' => function($personne){
                    return $personne->createQueryBuilder('p')
                               ->where('p.sexe = :sexe')
                               ->setParameter('sexe', 'masculin')
                               ->andWhere('YEAR(CURRENT_DATE()) - YEAR(p.dateNaissance) >= 18')
                               ->andWhere('p.situationMarital = :situationMarital')
                               ->setParameter('situationMarital', 'Marié');
                               
                },
                'choice_label' => 'nom',
                'multiple'      => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}