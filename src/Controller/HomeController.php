<?php

namespace App\Controller;

use App\Entity\Globals;
use App\Repository\GlobalsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function __construct(GlobalsRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index() : Response
    {
        
        
        $globals= $this->repository->findOneBy(['id' => 1]);
        return $this->render('pages/home.html.twig', [
            'current_menu' => 'home',
            'globals' => $globals

        ]);
    }
}