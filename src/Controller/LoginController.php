<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
                         'controller_name' => 'LoginController',
                         'last_username' => $lastUsername,
                         'error'         => $error,
                      ]);
    }

    #[Route('/login/message', name: 'login_message')]
    public function message(): Response
    {
         $this->addFlash('success', 'Logged In Successfully');

        return $this->render('login/view.html.twig', ['message'=>"Logged In Successfully"
         ]);
    }
}
