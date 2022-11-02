<?php

namespace App\Controller;

use App\Classes\LocaleClass;
use App\Entity\DisconnectedPresentation;
use App\Repository\PersonnageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Knp\Component\Pager\PaginatorInterface;

class DisconnectedHomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        if($this->getUser() == null){
            return $this->redirectToRoute("disconnected_home");
        }

        $locale = new LocaleClass($request);

        return $this->redirectToRoute("disconnected_home", [
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams()
        ]);
    }

    #[Route(path: '/logout', name: 'logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/{_locale}', name: 'disconnected_home')]
    public function disconnected_home(
        AuthenticationUtils $authenticationUtils, Request $request, EntityManagerInterface $entityManager): Response
    {
        if($this->getUser()){
            return $this->redirectToRoute('choiceCharacter');
        }

        $locale = new LocaleClass($request);
        $presentation = $entityManager->getRepository(DisconnectedPresentation::class)->findAll();

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();    

        return $this->render('disconnectedHome/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            "presentation" => $presentation,
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams()
        ]);
    }

    #[Route('/{_locale}/scores', name: 'disconnected-scores')]
    public function disconnectedScores(Request $request, PersonnageRepository $personnageRepository, PaginatorInterface $paginator): Response
    {
        // if($this->getUser() == null){
        //     return $this->redirectToRoute("disconnected_home");
        // }

        $locale = new LocaleClass($request);
        $data = $personnageRepository->findByLevelDesc();

        $scores = $paginator->paginate(
            $data,
            $request->query->getInt("page", 1),
            //10
            3
        );

        return $this->render('disconnectedHome/scores.html.twig',[
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams(),
            "scores" => $scores
        ]);
    }

    #[Route('/{_locale}/decouverte', name: 'discover')]
    public function discover(Request $request, PersonnageRepository $personnageRepository, PaginatorInterface $paginator): Response
    {
        // if($this->getUser() == null){
        //     return $this->redirectToRoute("disconnected_home");
        // }

        $locale = new LocaleClass($request);

        return $this->render('disconnectedHome/discover.html.twig',[
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams(),
        ]);
    }
}
