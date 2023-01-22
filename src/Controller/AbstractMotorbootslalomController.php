<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMotorbootslalomController extends AbstractController
{

    private const MOTORBOOTSLALOM = "Motorbootslalom";

    protected string $title = "";


    public function render(string $view, array $parameters = [], Response $response = null): Response
    {
        /** @var User $user */
        $user = $this->getUser();


        return parent::render($view, [
            "title" => AbstractMotorbootslalomController::MOTORBOOTSLALOM . empty($this->title) ? "" : " - " . $this->title,
            "year" => date("Y"),
            "user" => [
                "loggedIn" => null !== $user,
                "nickname" => $user?->getUsername(),
                "email" => $user?->getEmail()
            ],
            ...$parameters
        ]);
    }
}