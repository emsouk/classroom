<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user')]
final class UserController extends AbstractController
{
    #[Route(name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {

        return $this->json([
            'message' => 'display all users',
            'timestamp' => time(),
            'users' => $userRepository->findAll(),
        ], 200, [], ['groups' => ['user:read']]);
    }

    // #[Route('/new', name: 'app_user_new', methods: ['POST'])]
    // public function new(
    //     Request $request,
    //     EntityManagerInterface $entityManager,
    //     UserPasswordHasherInterface $passwordHasher
    // ): Response {
    //     // Récupère les données JSON de la requête
    //     $data = json_decode($request->getContent(), true);

    //     // Validation des données
    //     if (!$data) {
    //         return $this->json([
    //             'error' => 'Invalid JSON'
    //         ], 400);
    //     }

    //     // Vérification des champs requis
    //     $requiredFields = ['email', 'firstname', 'lastname', 'password'];
    //     foreach ($requiredFields as $field) {
    //         if (empty($data[$field])) {
    //             return $this->json([
    //                 'error' => "Field '$field' is required"
    //             ], 400);
    //         }
    //     }

    //     // Validation de l'email
    //     if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //         return $this->json([
    //             'error' => 'Invalid email format'
    //         ], 400);
    //     }

    //     // Vérifier si l'email existe déjà
    //     $existingUser = $entityManager->getRepository(User::class)
    //         ->findOneBy(['email' => $data['email']]);

    //     if ($existingUser) {
    //         return $this->json([
    //             'error' => 'Email already exists'
    //         ], 409); // Conflict
    //     }

    //     // Création du nouvel utilisateur
    //     $user = new User();
    //     $user->setEmail($data['email']);
    //     $user->setFirstname($data['firstname']);
    //     $user->setLastname($data['lastname']);

    //     // Hash du mot de passe
    //     $hashedPassword = $passwordHasher->hashPassword(
    //         $user,
    //         $data['password']
    //     );
    //     $user->setPassword($hashedPassword);

    //     // Définir les rôles (optionnel)
    //     $roles = $data['role'] ?? ['ROLE_USER'];
    //     $user->setRole($roles);

    //     // Persister en base de données
    //     try {
    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         return $this->json([
    //             'message' => 'User created successfully',
    //             'timestamp' => time(),
    //             'user' => $user,
    //         ], 201, [], ['groups' => ['user:read']]); // 201 = Created

    //     } catch (\Exception $e) {
    //         return $this->json([
    //             'error' => 'Failed to create user',
    //             'details' => $e->getMessage()
    //         ], 500);
    //     }
    // }



    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->json([
            'message' => 'User details',
            'timestamp' => time(),
            'user' => $user,
        ], 200, [], ['groups' => ['user:read']]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/connexion', name: 'app_user_login', methods: ['POST'])]
    public function login(Request $request, User $user, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->json([
            'message' => 'User details',
            'timestamp' => time(),
            'connected' => $userRepository->login(
                $request->getPayload()->getString('email'),
                $request->getPayload()->getString('password')
            ),
        ], 200, [], ['groups' => ['user:read']]);
    }
}
