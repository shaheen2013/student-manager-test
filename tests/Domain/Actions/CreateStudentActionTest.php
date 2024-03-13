<?php

namespace Tests\Domain\Actions;

use Tests\TestCase;
use App\Actions\CreateStudentAction;
use App\Domain\Repositories\StudentRepositoryInterface;
use App\DataTransferObjects\StudentDTO;

class CreateStudentActionTest extends TestCase
{
    public function test_create_student_action()
    {
        // Mock StudentRepositoryInterface
        $studentRepositoryMock = $this->createMock(StudentRepositoryInterface::class);
        
        // Set up expectations
        $studentRepositoryMock->expects($this->once())
            ->method('create')
            ->willReturn(new StudentDTO('John', 'john@example.com'));

        // Create instance of CreateStudentAction
        $createStudentAction = new CreateStudentAction($studentRepositoryMock);
        
        // Execute the action
        $student = $createStudentAction->execute(new StudentDTO('John', 'john@example.com'));
        
        // Assertions
        $this->assertEquals('John', $student->username);
        $this->assertEquals('john@example.com', $student->email);
    }
}
