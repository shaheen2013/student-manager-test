<?php

namespace Tests\Domain\Actions;

use Tests\TestCase;
use App\Domain\Actions\DeleteStudentAction;
use App\Domain\Repositories\StudentRepositoryInterface;

class DeleteStudentActionTest extends TestCase
{
    public function test_delete_student_action()
    {
        // Mock StudentRepositoryInterface
        $studentRepositoryMock = $this->createMock(StudentRepositoryInterface::class);
        
        // Set up expectations
        $studentRepositoryMock->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        // Create instance of DeleteStudentAction
        $deleteStudentAction = new DeleteStudentAction($studentRepositoryMock);
        
        // Execute the action
        $result = $deleteStudentAction->execute(1);
        
        // Assertion
        $this->assertTrue($result);
    }
}
