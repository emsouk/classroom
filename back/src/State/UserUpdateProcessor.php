<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use App\Service\UserService;

final class UserUpdateProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): User
    {
        return $this->userService->createUser([
            'email' => $data->getEmail(),
            'firstname' => $data->getFirstname(),
            'lastname' => $data->getLastname(),
            'password' => $data->getPassword(),
        ]);
    }
}
