<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(annonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findAll();
        return $this->json($annonces);
    }

    /**
     * @Route("/annonce/create", name="annonce_create", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $manager){
        $jsonRecu = $request->getContent();
        $annonce = $serializer->deserialize($jsonRecu, Annonce::class, 'json');

        $manager->persist($annonce);
        $manager->flush();

        return $this->json($annonce, 200);
    }
    /**
     * @Route("/annonce/delete/{id}", name="annonce_delete", methods={"delete"})
     */
    public function delete(Annonce $annonce, EntityManagerInterface $manager){
        $manager->remove($annonce);
        $manager->flush();
        return $this->json('annonce bien supprimer', 201);
    }
}
