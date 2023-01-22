<?php

namespace App\Controller\User;


use App\Controller\AbstractMotorbootslalomController;
use App\Entity\User;
use App\Form\SelectInstitutionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractMotorbootslalomController
{
    protected string $title = "User";
    #[Route("/user", name: "app_user_user_index")]
    #[IsGranted("ROLE_USER")]
    public function index(): Response
    {
        /* @var $user User */
        $user = $this->getUser();
        if($user->getPerson()->getInstitutionen()->count() == 0) {
            return $this->redirectToRoute("app_user_user_selectinstitutionen");
        }




        return $this->render("user/index.html.twig");
    }

    #[Route("/user/selectInstitutionen", name: "app_user_user_selectinstitutionen")]
    #[IsGranted("ROLE_USER")]
    public function selectInstitutionen(Request $request): Response
    {

        $form = $this->createForm(SelectInstitutionType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // TODO: Stuff
        }

        return $this->render("user/selectinstitutioen.html.twig", [
            "form" => $form
        ]);

    }

}