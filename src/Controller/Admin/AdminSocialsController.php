<?php

namespace App\Controller\Admin;

use App\Form\SocialType;
use App\Repository\SocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSocialsController extends AbstractController
{

    /**
     * @var SocialRepository
     */
    private $repository;



    public function __construct(SocialRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

        /**
     * Undocumented function
     * @Route("/admin/socials", name="admin.socials.index")
     * @return Response
     */
    public function index(SocialRepository $socialRepository,Request $request): Response
    {

        $socials = $socialRepository->findAll();
        $form = $this->createForm(CollectionType::class, $socials, array(
                        'entry_type' => SocialType::class,
                        'label' => false,
                        'allow_add' => true
                ));

        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Réseaux sociaux modifiés avec succès');
            return $this->redirectToRoute('admin.globals.index');

        }
        return $this->render('admin/socials.html.twig', [
            'current_menu' => 'admin.socials.index',
            'form' => $form->createView()
        ]);
    }


}