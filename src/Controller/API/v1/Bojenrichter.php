<?php

namespace App\Controller\API\v1;

use App\Repository\DisqualifikationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route("/api/v1")]
#[IsGranted("IS_AUTHENTICATED_FULLY")]
class Bojenrichter extends AbstractController
{

    #[Route("/input", options: ["expose" => true], methods: ["POST"])]
    public function wkr_input(Request $request): Response {
        return new JsonResponse($request->getContent());
    }

    #[Route("/disqualification_reasons", options: ["expose" => true], methods: ["GET"])]
    public function disqualification_reasons(DisqualifikationRepository $disqualifikationRepository): Response {
        return $this->json($disqualifikationRepository->findAll());
    }

}