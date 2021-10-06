<?php

namespace App\Controller\Admin;

use App\Entity\Globals;
use App\Form\GlobalsType;
use App\Repository\GlobalsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGlobalsController extends AbstractController
{

    /**
     * @var GlobalsRepository
     */
    private $repository;



    public function __construct(GlobalsRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

      /**
     * Undocumented function
     * @Route("/admin", name="admin.globals")
     * @return Response
     */
    public function edit(Globals $globals, Request $request)
    {
        $form = $this->createForm(GlobalsType::class, $globals);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Article modifié avec succès');
            return $this->redirectToRoute('admin.globals');

        }
        return $this->render('admin/index.html.twig', [
            'globals' => $globals,
            'form' => $form->createView()
        ]);
    }
}