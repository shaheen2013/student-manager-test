<?php

namespace App\Domain\Services;

use App\DataTransferObjects\StudentDTO;

interface StudentServiceInterface
{
    public function createStudent(StudentDTO $studentDTO);
    public function deleteStudent(int $studentId);
    public function getAllStudents();
}
