<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\Groups;

class CourseDTO
{
    public function __construct(
        #[Groups(['user:read:courses'])]
        public readonly string $title,
    ) {}
}
