<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GarageController extends AbstractController
{
    /**
     * @Route("/garage", name="garage")
     */
    public function index(GarageRepository $GarageRepository): Response
    {

        $garages = $GarageRepository->findAll();

        return $this->json($garages,201,[], [
            "groups"=> [
            "garages"]
        ]);
    }



}
