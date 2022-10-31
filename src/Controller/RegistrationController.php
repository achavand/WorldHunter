<?php

namespace App\Controller;

use App\Classes\LocaleClass;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/{_locale}/inscription', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        if($this->getUser()){
            return $this->redirectToRoute('choiceCharacter');
        }
        
        $locale = new LocaleClass($request);
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user, ["attr" => ['class' => "log-form"]]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(["ROLE_USER"]);
            $user->setRegisterDate(new \DateTime());
            $user->setPassword($userPasswordHasher->hashPassword( $user, $form->get('password')->getData()));   
            $entityManager->persist($user);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams()
        ]);
    }
}
