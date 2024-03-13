<?php

namespace App\Actions;

use App\Domain\Services\StudentServiceInterface;

class DeleteStudentAction
{
    protected $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }

    public function execute(int $studentId)
    {
        return $this->studentService->deleteStudent($studentId);
    }
}
