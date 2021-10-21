<?php

namespace App\Controller;


use App\Repository\GlobalsRepository;
use App\Repository\SocialRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function __construct(GlobalsRepository $globalsrepository, SocialRepository $socialRepository)
    {
        $this->globalsrepository = $globalsrepository;
        $this->socialRepository = $socialRepository;
    }
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index() : Response
    {
        
        
        $globals= $this->globalsrepository->findOneBy(['id' => 1]);
        $socials = $this->socialRepository->findVisibleQuery();
        return $this->render('pages/home.html.twig', [
            'current_menu' => 'home',
            'globals' => $globals,
            'socials' => $socials

        ]);
    }
}