<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\StudentDTO;
use App\Actions\CreateStudentAction;
use App\Actions\DeleteStudentAction;
use App\Actions\FetchStudentsAction;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $createStudentAction;
    protected $deleteStudentAction;
    protected $fetchStudentsAction;

    public function __construct(
        CreateStudentAction $createStudentAction,
        DeleteStudentAction $deleteStudentAction,
        FetchStudentsAction $fetchStudentsAction
    ) {
        $this->createStudentAction = $createStudentAction;
        $this->deleteStudentAction = $deleteStudentAction;
        $this->fetchStudentsAction = $fetchStudentsAction;
    }

    public function index()
    {
        $students = $this->fetchStudentsAction->execute();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
        ]);

        $studentDTO = new StudentDTO($data['username'], $data['email']);
        $newStudent = $this->createStudentAction->execute($studentDTO);

        return response()->json($newStudent, 201);
    }

    public function destroy($id)
    {
        $this->deleteStudentAction->execute($id);
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
