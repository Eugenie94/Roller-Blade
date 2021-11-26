<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
   /**
     * Page Profil
     * http://localhost:8000/profil
     * @Route("/profil", name="user_profil", methods={"GET"})
     */
    public function profil(UserRepository $userRepository)
    {
        return $this->render('user/profil.html.twig', [
            'profil' => $userRepository->findOneBy(['id' => 'user'])
        ]);
    }

     /**
     * Formulaire modification profil
     * http://localhost:8000/edit
     * @Route("/edit", name="user_edit", methods={"GET|POST"})
     */
    public function edit(Request $request): Response
    {

        $user = $this->getUser();

        # Création d'un Formulaire de modification
        $form = $this->createFormBuilder($user = $this->getUser())
            ->add('firstname', TextType::class, [
                'label' => ''
            ])
            ->add('lastname', TextType::class, [
                'label' => ''
            ])
            ->add('dog_name', TextType::class, [
                'label' => '',
            ])
            ->add('address', TextType::class, [
                'label' => "Adresse"
            ])
            ->add('city', TextType::class, [
                'label' => "Ville"
            ])
            ->add('zipcode', NumberType::class, [
                'label' => "Code Postal"
            ])
            ->add('email', EmailType::class, [
                'label' => "E-mail"
            ])
            ->add('password', PasswordType::class, [
                'label' => "Mot de passe",
                'required' => "true"
            ])
            ->add('telephone', TelType::class, [
                'label' => "Téléphone"
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Valider"
            ])
            ->getForm();

        # Permet à Symfony de gérer les données saisies par l'utilisateur
        $form->handleRequest($request);

        # Si le formulaire est soumis et valide => C'est comme en procédural quand on écrit if Post(empty) etc etc
        if ($form->isSubmitted() && $form->isValid()) {

            // # Encodage du mot de passe
            // $user = $this->getUser()->setPassword(
            //     $encoder->encodePassword(
            //         $user, $user->getPassword()
            //     )
            // );

            # Insertion dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($user = $this->getUser());
            $em->flush();


            # Redirection vers la page profil
            return $this->redirectToRoute('user_profil');
        }

        # Passer le formulaire à la vue
        return $this->render('user/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
