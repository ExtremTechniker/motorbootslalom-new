<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vorname')
            ->add('nachname')
            ->add('email')
            ->add('geburtstag')
            ->add('geschlecht')
            ->add('telefon')
            ->add('telefonMobil')
            ->add('strasse')
            ->add('hausnummer')
            ->add('plz')
            ->add('ort')
            ->add('pilot')
            ->add('mbsLizenz')
            ->add('ms11Lizenz')
            ->add('rennLizenz')
            ->add('institutionen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
