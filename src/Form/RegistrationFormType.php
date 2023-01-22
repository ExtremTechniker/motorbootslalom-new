<?php

namespace App\Form;

use App\Entity\User;
use Rollerworks\Component\PasswordStrength\Validator\Constraints as RollerworksPassword;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("email")
            ->add('username')
            /*->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])*/
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                //'first_options'  => ['label' => 'Passwort', 'hash_property_path' => 'password'],
                //'second_options' => ['label' => 'Passwort Wiederholen'],
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'max' => 4096,
                    ]),
                    new NotCompromisedPassword(),
                    new RollerworksPassword\PasswordStrength([
                        "minLength" => 7,
                        "minStrength" => 3

                    ])
                ],
            ])
            ->add('_vorname', TextType::class, [
                'mapped' => false
            ])
            ->add('_nachname', TextType::class, [
                'mapped' => false
            ])
            ->add('_geburtstag', DateType::class, [
                'mapped' => false,
                'widget' => 'single_text',
            ])
            ->add('_geschlecht', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Männlich' =>'m',
                    'Weiblich' => 'w',
                    'Divers' => 'd']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
