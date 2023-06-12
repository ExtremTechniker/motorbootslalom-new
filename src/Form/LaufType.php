<?php

namespace App\Form;

use App\Entity\Disqualtifikationen\Disqualifikation;
use App\Entity\Disqualtifikationen\DisqualifikationsAnforderung;
use App\Entity\Lauf;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaufType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("l_bemerkung", TextType::class)
            ->add("da_bemerkung", TextType::class, [
                "mapped" => false,
                "label" => "Kommentar zur Disqualifikation"
            ])

            // TODO: disq as EntityType multiple + duallistbox
            ->add("disqualifkations_anforderung", DualListBoxType::class, [
                "multiple" => true,
                "mapped" => false,
                "label" => false,
                'class' => Disqualifikation::class,

            ])
            ->add('bojen', BojenType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
                if (!$event->getForm()->isValid()) return;
                /** @var Lauf $data */
                $data = $event->getData();

                foreach ($event->getForm()->get('disqualifkations_anforderung')->getData() as $disq) {
                    $disqualifikation = new DisqualifikationsAnforderung();
                    /*$disqualifikation->*/
                }
                
                /*$data->addDisqualificationsAnforderungen()*/
            })
         ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lauf::class,
        ]);
    }

}