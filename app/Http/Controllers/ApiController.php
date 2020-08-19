<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student as Student;

class ApiController extends Controller
{
    public function getAllStudents(Request $request)
    {
        $isGet = $request->isMethod('GET');
        if ( !$isGet ) {
            return response('Method Not Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $students = Student::all();
        if (!count($students)) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }
        $students = $students->toJson(JSON_PRETTY_PRINT);

        return response($students, 200)
            ->header('Content-Type', 'application/json');
    }

    public function getStudent(Request $request, $id)
    {
        $isGet = $request->isMethod('GET');
        if ( !$isGet ) {
            return response('Method Not Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $student = Student::where('id', $id)->get();
        if (!count($student)) {
            return response('No Content', 204)
                ->header('Content-Type', 'application/json');
        }
        $student = $student->toJson(JSON_PRETTY_PRINT);

        return response($student, 200)
            ->header('Content-Type', 'application/json');
    }

    public function createStudent(Request $request)
    {
        $isPost = $request->isMethod('POST');
        if (!$isPost) {
            return response('Method Now Allowed', 405)
                ->header('Content-Type', 'application/json');
        }
        $var = $request->post();

        $student = new Student();
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function updateStudent(Request $request, $id)
    {

    }

    public function deleteStudent($id)
    {

    }
}
