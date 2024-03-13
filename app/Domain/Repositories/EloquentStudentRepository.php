<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Student;

class EloquentStudentRepository implements StudentRepositoryInterface
{
    public function create(array $data): Student
    {
        return Student::create($data);
    }

    public function delete(int $id): bool
    {
        return Student::destroy($id);
    }

    public function getAll(): array
    {
        return Student::all()->toArray();
    }
}
