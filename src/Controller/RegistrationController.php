<?php

namespace App\Controller;

use App\Entity\UserDetails;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new UserDetails();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('_profiler_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    #[Route('/login/message', name: 'login_message')]
    public function message(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new UserDetails();
        $username=$request->request->get('username');
            $password=$request->request->get('password');
          

            $user=$entityManager->getRepository('App:UserDetails')->findOneBy(['username'=>$username]);
            // dump($pwd); die;
            if($user)
            {
                return $this->render('login/view.html.twig');
            }
            else
            {
        return $this->render('login/error.html.twig');
            }
           // $em =  $this->getDoctrine()->getManager();
           // $user=$entityManager->getRepository('App:UserDetails')->findOneBy(['username'=>$username,'password'=>$password]);
           // dump($user); die;

      
    }

    // #[Route('/login/message', name: 'login_message')]
    // public function message(Request $request): Response
    // {
    //     $username=$request->request->get('username');
    //     $password=$request->request->get('password');
    //     $em =  $this->getDoctrine()->getManager();
    //     $user=$em->getRepository('App:UserDetails')->findOneBy(['username'=>$username,'password'=>$password]);
    //     dump($user); die;
    //      $this->addFlash('success', 'Logged In Successfully');

    //     return $this->render('login/view.html.twig', ['message'=>"Logged In Successfully"
    //      ]);
    // }
}
