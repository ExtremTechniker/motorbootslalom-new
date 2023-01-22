<?php

namespace App\Controller\User;


use App\Controller\AbstractMotorbootslalomController;
use App\Form\BojenrichterType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BojenrichterController extends AbstractMotorbootslalomController
{
    protected string $title = "Bojenrichter";

    /**
     * @Route(name="bojenrichter", path="/user/bojenrichter")
     */
    public function BojenRichter(): Response
    {

        return $this->render("user/bojenrichter/index.html.twig");
    }

    /**
     * @Route(name="bojenrichter_eingabe", path="/user/bojenrichter/eingabe")
     */
    public function BojenrichterEingabe(): Response
    {

        $form = $this->createForm(BojenrichterType::class);

        return $this->render("user/bojenrichter/eingabe.html.twig", [
            "form" => $form,
            "aktuellerStarter" => [
                "vorname" => "Robert",
                "nachname" => "Hesselmann",
                "klasse" => "M6",
                "startnummer" => "66",
                "lauf" => "1",
                "zusatzgewicht" => 0,
            ],
            "perms"=> [
                "bojenrichter" => 1,
                "steg" => 1,
                "t5Durchfahrt" => 1,
                "schikane" => 1,
                "durchreissen" => 1,
                "zeitnahme" => 1,
                "disqAnforderung" => 1,
            ],
            "bojen" => [
                "H_T0_l" => 1,
                "H_T0_r" => 1,
                "H_T1_l" => 1,
                "H_T1_r" => 1,
                "H_T2_l" => 1,
                "H_T2_r" => 1,
                "H_T3_l" => 1,
                "H_T3_r" => 1,
                "H_T4_l" => 1,
                "H_T4_r" => 1,
                "H_T5_l" => 1,
                "H_T5_r" => 1,
                "R_T5_l" => 1,
                "R_T5_r" => 1,
                "R_T4_l" => 1,
                "R_T4_r" => 1,
                "R_T3_l" => 1,
                "R_T3_r" => 1,
                "R_T2_l" => 1,
                "R_T2_r" => 1,
                "R_T1_l" => 1,
                "R_T1_r" => 1,
                "R_T0_l" => 0,
                "R_T0_r" => 0,
                "SB_l" => 0,
                "SB_r" => 0
            ],
            "laufId" => 350,
            "wkrId" => 1,
        ] );
    }
}