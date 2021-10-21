<?php

namespace App\Controller\Admin;

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
     * @Route("/admin", name="admin.globals.index")
     * @return Response
     */
    public function index(GlobalsRepository $globalsRepository, Request $request): Response
    {

       /*return $this->render('admin/index.html.twig', [
            'current_menu' => 'admin.index',
            'items' => $globalsRepository->findOneBy(array('id' => 1))
            
        ]);*/
        $globals = $globalsRepository->findOneBy(array('id' => 1));
        $form = $this->createForm(GlobalsType::class, $globals);
                        
        

        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Page modifiée avec succès');
            return $this->redirectToRoute('admin.globals.index');

        }
        return $this->render('admin/index.html.twig', [
            'current_menu' => 'admin.globals.index',
            'globals' => $globals,
            'form' => $form->createView()
        ]);
    }


}