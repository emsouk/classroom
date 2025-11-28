<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/user')]
final class UserController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('', name: 'app_user_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->json([
            'message' => 'display all users',
            'timestamp' => time(),
            'users' => $this->userService->getAllActiveUsers(),
        ], 200, [], ['groups' => ['user:read']]);
    }


    #[Route('/subscribe', name: 'app_user_subscribe', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        try {
            $user = $this->userService->createUser($data);

            return $this->json([
                'message' => 'User created successfully',
                'timestamp' => time(),
                'user' => $user,
            ], 201, [], ['groups' => ['user:read']]);
        } catch (\InvalidArgumentException $e) {
            $statusCode = str_contains($e->getMessage(), 'already exists') ? 409 : 400;
            return $this->json(['error' => $e->getMessage()], $statusCode);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Failed to create user',
                'details' => $e->getMessage(),
            ], 500);
        }
    }


    #[Route('/connexion', name: 'app_user_login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $email = $request->getPayload()->getString('email');
        $password = $request->getPayload()->getString('password');

        $user = $this->userService->verifyUserCredentials($email, $password);

        if (!$user) {
            return $this->json(['error' => 'Invalid credentials'], 401);
        }
        return $this->json([
            'message' => 'Login successful',
            'timestamp' => time(),
            'user' => $user,
        ], 200, [], ['groups' => ['user:read']]);
    }

    #[Route('/{id}', name: 'app_user_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->json([
            'message' => 'User details',
            'timestamp' => time(),
            'user' => $user,
        ], 200, [], ['groups' => ['user:read']]);
    }


    #[Route('/{id}', name: 'app_user_update', requirements: ['id' => '\d+'], methods: ['PUT', 'PATCH'])]
    public function update(Request $request, User $user): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        try {
            $user = $this->userService->updateUser($user, $data);

            return $this->json([
                'message' => 'User updated successfully',
                'timestamp' => time(),
                'user' => $user,
            ], 200, [], ['groups' => ['user:read']]);
        } catch (\InvalidArgumentException $e) {
            return $this->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Failed to update user',
                'details' => $e->getMessage(),
            ], 500);
        }
    }


    #[Route('/{id}', name: 'app_user_delete', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function delete(User $user): Response
    {
        try {
            $this->userService->deleteUser($user);

            return $this->json([
                'message' => 'User deleted successfully',
                'timestamp' => time(),
            ], 200);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Failed to delete user',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
