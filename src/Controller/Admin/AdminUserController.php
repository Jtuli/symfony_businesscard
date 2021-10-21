<?php

namespace App\Controller\Admin;

use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminUserController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $repository;



    public function __construct(UserRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

        /**
     * Undocumented function
     * @Route("/admin/user", name="admin.user.index")
     * @return Response
     */
    public function index(UserRepository $userRepository,Request $request, UserPasswordHasherInterface $encoder): Response
    {

        $user = $userRepository->findOneBy(['id' => 1]);
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
           
            $changePassword= $form->getData();
            $pass = $changePassword->getNewpassword();
            $password = $encoder->hashPassword($user, $pass);
            $userRepository->upgradePassword($user, $password);

            //$this->em->flush();
            //$this->addFlash('success', 'Mot de passe modifié avec succès');
           // return $this->redirectToRoute('admin.user.index');

        }
        return $this->render('admin/user.html.twig', [
            'current_menu' => 'admin.user.index',
            'user' => $user,
            'form' => $form->createView()
        ]);
    }


}