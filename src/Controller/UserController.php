<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
    *@Route("/login", name="login")
    */
    public function login(): Response
    {
        return $this->render('user/login.html.twig', []);
    }

    /**
    *@Route("/logout", name="logout")
    */
    public function logout()
    {
    }


    /**
     * @Route("/api/register", name="register", methods={"POST"})
     *
     */
    public function register(Request $req, SerializerInterface $serializer, EntityManagerInterface  $EntityManagerInterface, UserPassHashInter $userPassHashInter, UserInterface $userInterface): Response
    {
        // ONLY AN ADMIN CAN REGISTER A NEW USER
        if (in_array("ROLE_ADMIN", $userInterface->getRoles())) {

            $jsonUser = $req->getContent();
            $user = $serializer->deserialize($jsonUser, User::class, 'json');
            $hashedPassword = $userPassHashInter->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);
            // dd($user);
            $user->setRoles(["ROLE_OWNER"]);
            $EntityManagerInterface->persist($user);
            $EntityManagerInterface->flush();

            $data = ["user_register" => "success"];
            return $this->json(
                $data,
                200,
                [],
                [
                    "groups" => [
                        "userApi"
                    ]
                ]
            );
        } else {
            $data = ["user_register" => "SOO SORRY, YOU DON'T HAVE PERMISSION FOR THAT"];
            return $this->json(
                $data,
                200
            );
        }
    }

}
