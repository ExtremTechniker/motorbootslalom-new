<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BojenrichterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("wkr_id", HiddenType::class)
            ->add("lauf_id", HiddenType::class)
            ->add("l_bemerkung", TextType::class)
            ->add("da_bemerkung", TextType::class, [
                "label" => "Kommentar zur Disqualifikation"
            ])
            ->add("SB_l", CheckboxType::class)
            ->add("SB_r", CheckboxType::class)
            ->add("disq", ChoiceType::class, [
                "multiple" => true,
                "label" => false,
                "choices" => [
                    "Fahren ohne Quickstop"=> 1,
                    "Nicht funktionsgerechtes / vollständiges Tragen der persönlichen (Schutz-) Ausrüstung"=> 2,
                    "Überfahren einer Boje"=> 3,
                    "Falscher Parcours"=> 4,
                    "Wiederholtes Anfahren eines Manövers"=> 5,
                    "Rückwärtsfahren im Parcours"=> 6,
                    "4. Versuch eines Manövers (Schikane, Rückwärtstor)"=> 7,
                    "Stehen im Boot"=> 8,
                    "Sitzen auf dem Schlauch"=> 9,
                    "Berühren des Start-/Zieltores"=> 10,
                    "Unsportliches Verhalten"=> 11,
                ]
            ])
        ;

        foreach(["H", "R"] as $dir) {
            for($i=5; $i>=0;$i--) {
                foreach(["l","r"] as $lr) {
                    $builder->add($dir."_T".$i."_".$lr, CheckboxType::class, [
                        "required" => false,
                        "value" => 1,
                        "label" => false,

                    ]);
                }
            }
        }


    }


}