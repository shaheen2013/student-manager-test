<?php

namespace App\Domain\Services;

use App\DataTransferObjects\StudentDTO;
use App\Domain\Models\Student;

interface StudentServiceInterface
{
    public function createStudent(StudentDTO $studentDTO): Mixed;
    public function deleteStudent(int $studentId);
    public function getAllStudents();
}
