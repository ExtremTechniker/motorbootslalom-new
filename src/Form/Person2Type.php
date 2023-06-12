<?php

namespace App\Form;

use App\Entity\Institutionen\Institution;
use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Person2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vorname', TextType::class, [
                'required' => true,
            ])
            ->add('nachname', TextType::class, [
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'required' => true,
            ])
            ->add('geburtstag', DateType::class)
            ->add('geschlecht', ChoiceType::class, [
                "choices" => [
                    "Männlich" => "m",
                    "Weiblich" => "w",
                    "Divers" => "d",
                ]
            ])
            ->add('telefon', TelType::class)
            ->add('telefonMobil', TelType::class)
            ->add('strasse', TextType::class)
            ->add('hausnummer', TextType::class)
            ->add('plz', TextType::class)
            ->add('ort', TextType::class)
            ->add('pilot', CheckboxType::class)
            ->add('mbsLizenz', TextType::class)
            ->add('ms11Lizenz', TextType::class)
            ->add('rennLizenz', TextType::class)
            ->add('institutionen', DualListBoxType::class, [
                'class' => Institution::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
            'required' => false
        ]);
    }
}
