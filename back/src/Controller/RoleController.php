<?php

namespace App\Controller;

use App\Entity\Role;
use App\Form\RoleType;
use App\Repository\RoleRepository;
use App\Service\RoleService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/role')]
final class RoleController extends AbstractController
{
    public function __construct(private RoleService $roleService) {}

    #[Route(name: 'app_role_index', methods: ['GET'])]
    public function index(RoleRepository $roleRepository): Response
    {
        return $this->json([
            'message' => 'display all roles',
            'timestamp' => time(),
            'roles' => $this->roleService->getAllRoles(),
        ], 200, [], ['groups' => ['role:read']]);
    }

    #[Route('/{id}', name: 'app_role_show', methods: ['GET'])]
    public function show(Role $role): Response
    {
        return $this->json([
            'message' => 'display role by id',
            'timestamp' => time(),
            'role' => $role,
        ], 200, [], ['groups' => ['role:read']]);
    }
}
