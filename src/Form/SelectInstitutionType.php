<?php

namespace App\Form;

use App\Entity\Institutionen\Institution;
use App\Entity\Person;
use App\Repository\InstitutionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelectInstitutionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('institutionen', EntityType::class, [
                'attr' => [
                    'class' => 'dualListBox',
                ],
                'multiple' => true,
                'class' => Institution::class,
                'query_builder' => function (InstitutionRepository $rp) {
                    return $rp->findAllBaseQuery();
                },
                'choice_label' => function($institution) {
                    return "(".$institution->getKurzform().") ".$institution->getName()." - \n\r(".
                    $institution->getLand()->getKurzform().") ".$institution->getLand()->getName()." - \n\r(".
                    $institution->getStaat()->getKurzform().") ".$institution->getStaat()->getName();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            Person::class
        ]);
    }
}
