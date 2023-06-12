<?php

namespace App\Controller\Admin;

use App\Controller\AbstractMotorbootslalomController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractMotorbootslalomController
{

    protected string $title = "Admin";

    /*#[Route("/admin", name: "app_admin_admin_index")]
    public function index(): Response
    {
        return $this->render("admin/index.html.twig");
    }*/
}