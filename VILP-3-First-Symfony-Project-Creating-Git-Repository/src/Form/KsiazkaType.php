<?php

namespace App\Form;

use App\Entity\Autor;
use App\Entity\Gatunek;
use App\Entity\Ksiazka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class KsiazkaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tytul')
            ->add('opis')
            ->add('rokWydania')
            ->add('krajWydania')
            ->add('dostepnosc')
            ->add('dataDodania')
            ->add('dataEdycji')
        ;
        $builder->add('gatunek', EntityType::class, [
            // looks for choices from this entity
            'class' => Gatunek::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'id',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ]);
        ;
        $builder->add('autor', EntityType::class, [
            // looks for choices from this entity
            'class' => Autor::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'id',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ksiazka::class,
        ]);
    }
}
