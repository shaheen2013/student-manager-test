<?php

namespace App\Actions;

use App\Domain\Services\StudentServiceInterface;
use App\DataTransferObjects\StudentDTO;

class CreateStudentAction
{
    protected $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }

    public function execute(StudentDTO $studentDTO): Student
    {
        return $this->studentService->createStudent($studentDTO);
    }
}
