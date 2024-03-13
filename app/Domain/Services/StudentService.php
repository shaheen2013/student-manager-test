<?php

namespace App\Domain\Services;

use App\Domain\Repositories\StudentRepositoryInterface;
use App\DataTransferObjects\StudentDTO;
use App\Domain\Models\Student;


class StudentService implements StudentServiceInterface
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function createStudent(StudentDTO $studentDTO): Student // Update return type
    {
        return $this->studentRepository->create([
            'username' => $studentDTO->username,
            'email' => $studentDTO->email,
        ]);
    }

    public function deleteStudent(int $studentId)
    {
        return $this->studentRepository->delete($studentId);
    }

    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }
}
