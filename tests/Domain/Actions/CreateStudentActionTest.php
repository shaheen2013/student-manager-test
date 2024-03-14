<?php

namespace Tests\Domain\Actions;

use Tests\TestCase;
use App\Actions\CreateStudentAction;
use App\Domain\Services\StudentServiceInterface; // Import StudentServiceInterface
use App\Domain\Models\Student;
use App\DataTransferObjects\StudentDTO;

class CreateStudentActionTest extends TestCase
{
    public function test_create_student_action()
    {
        // Mock StudentServiceInterface
        $studentServiceMock = $this->createMock(StudentServiceInterface::class);
        
        // Set up expectations
        $studentServiceMock->expects($this->once())
            ->method('createStudent')
            ->willReturn(new Student(['username' => 'John', 'email' => 'john@example.com']));

        // Create instance of CreateStudentAction with the correct dependency
        $createStudentAction = new CreateStudentAction($studentServiceMock);
        
        // Execute the action
        $student = $createStudentAction->execute(new StudentDTO('John', 'john@example.com'));
        
        // Assertions
        $this->assertInstanceOf(Student::class, $student);
        $this->assertEquals('John', $student->username);
        $this->assertEquals('john@example.com', $student->email);
    }
}
