<?php

namespace App\Form;

use App\Entity\Ksiazki;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KsiazkiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tytul')
            ->add('opis')
            ->add('autor')
            ->add('gatunek')/*, EntityType::class, [
                        // looks for choices from this entity
                        'class' => GatunkiType::class,

                        // uses the User.username property as the visible option string
                        'choice_label' => 'nazwaGat',

                        // used to render a select box, check boxes or radios
                        // 'multiple' => true,
                        // 'expanded' => true,
                    ])*/
            ->add('rokWydania')
            ->add('krajWydania')
            ->add('dostepnosc')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ksiazki::class,
        ]);
    }
}
