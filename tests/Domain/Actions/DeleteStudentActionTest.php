<?php

namespace Tests\Domain\Actions;

use Tests\TestCase;
use App\Actions\DeleteStudentAction;
use App\Domain\Services\StudentServiceInterface; // Import StudentServiceInterface
use App\Domain\Models\Student;

class DeleteStudentActionTest extends TestCase
{
    public function test_delete_student_action()
    {
        // Mock StudentServiceInterface
        $studentServiceMock = $this->createMock(StudentServiceInterface::class);
        
        // Set up expectations
        $studentServiceMock->expects($this->once())
            ->method('deleteStudent')
            ->with(1)
            ->willReturn(true);

        // Create instance of DeleteStudentAction with the correct dependency
        $deleteStudentAction = new DeleteStudentAction($studentServiceMock);
        
        // Execute the action
        $result = $deleteStudentAction->execute(1);
        
        // Assertion
        $this->assertTrue($result);
    }
}
