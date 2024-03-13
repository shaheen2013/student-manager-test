<?php

namespace App\Actions;

use App\Domain\Services\StudentServiceInterface;

class FetchStudentsAction
{
    protected $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }

    public function execute()
    {
        return $this->studentService->getAllStudents();
    }
}
