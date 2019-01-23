<?php

namespace App\Form;

use App\Entity\Ksiazka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KsiazkaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nazwa')
            ->add('opis')
            ->add('rok')
            ->add('kraj')
            ->add('dostepnosc')
            ->add('dataDodania')
            ->add('dataEdycji')
            ->add('autor')
            ->add('gatunek')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ksiazka::class,
        ]);
    }
}
