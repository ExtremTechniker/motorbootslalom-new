<?php

namespace App\Controller\User;


use App\Controller\AbstractMotorbootslalomController;
use App\Entity\User;
use App\Form\SelectInstitutionType;
use App\Repository\PersonRepository;
use App\Repository\UserRepository;
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
        if($user->getInstitutionen()->count() != 0) {
            $this->addFlash("info", "Test https://google.de app_login app_login{} app_login{test=2}");
            $this->addFlash("info", "app_login app_login{} app_login{test=2}");
            $this->addFlash("info", "Test app_login{}[Login]");
            //return $this->redirectToRoute("app_user_user_selectinstitutionen");
        }


        return $this->render("user/index.html.twig");
    }

    #[Route("/user/selectInstitutionen", name: "app_user_user_selectinstitutionen")]
    #[IsGranted("ROLE_USER")]
    public function selectInstitutionen(Request $request, PersonRepository $personRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $person = $user->getPerson();
        $form = $this->createForm(SelectInstitutionType::class, $person);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $personRepository->save($person, true);
            return $this->redirectToRoute('app_user_user_index');
        }

        return $this->render("user/selectinstitutioen.html.twig", [
            "form" => $form
        ]);

    }

}