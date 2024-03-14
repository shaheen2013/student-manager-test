<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Student;

interface StudentRepositoryInterface
{
    public function create(array $data): Mixed;
    public function delete(int $id): bool;
    public function getAll(): array;
}
